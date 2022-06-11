/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {

	_.extend(OC.Files.Client, {
		PROPERTY_SHARE_TYPES:	'{' + OC.Files.Client.NS_OWNCLOUD + '}share-types',
		PROPERTY_OWNER_ID:	'{' + OC.Files.Client.NS_OWNCLOUD + '}owner-id',
		PROPERTY_OWNER_DISPLAY_NAME:	'{' + OC.Files.Client.NS_OWNCLOUD + '}owner-display-name'
	});

	if (!OCA.Sharing) {
		OCA.Sharing = {};
	}
	/**
	 * @namespace
	 */
	OCA.Sharing.Util = {
		/**
		 * Initialize the sharing plugin.
		 *
		 * Registers the "Share" file action and adds additional
		 * DOM attributes for the sharing file info.
		 *
		 * @param {OCA.Files.FileList} fileList file list to be extended
		 */
		attach: function(fileList) {
			// core sharing is disabled/not loaded
			if (!OC.Share) {
				return;
			}
			if (fileList.id === 'trashbin' || fileList.id === 'files.public') {
				return;
			}
			var fileActions = fileList.fileActions;
			var oldCreateRow = fileList._createRow;
			fileList._createRow = function(fileData) {

				var tr = oldCreateRow.apply(this, arguments);
				var sharePermissions = OCA.Sharing.Util.getSharePermissions(fileData);
				
				if (fileData.permissions === 0) {
					// no permission, disabling sidebar
					delete fileActions.actions.all.Comment;
					delete fileActions.actions.all.Details;
					delete fileActions.actions.all.Goto;
				}
				tr.attr('data-share-permissions', sharePermissions);
				if (fileData.shareOwner) {
					tr.attr('data-share-owner', fileData.shareOwner);
					tr.attr('data-share-owner-id', fileData.shareOwnerId);
					// user should always be able to rename a mount point
					if (fileData.mountType === 'shared-root') {
						tr.attr('data-permissions', fileData.permissions | OC.PERMISSION_UPDATE);
					}
				}
				if (fileData.recipientData && !_.isEmpty(fileData.recipientData)) {
					tr.attr('data-share-recipient-data', JSON.stringify(fileData.recipientData));
				}
				if (fileData.shareTypes) {
					tr.attr('data-share-types', fileData.shareTypes.join(','));
				}
				return tr;
			};

			var oldElementToFile = fileList.elementToFile;
			fileList.elementToFile = function($el) {
				var fileInfo = oldElementToFile.apply(this, arguments);
				fileInfo.sharePermissions = $el.attr('data-share-permissions') || undefined;
				fileInfo.shareOwner = $el.attr('data-share-owner') || undefined;
				fileInfo.shareOwnerId = $el.attr('data-share-owner-id') || undefined;

				if( $el.attr('data-share-types')){
					fileInfo.shareTypes = $el.attr('data-share-types').split(',');
				}

				if( $el.attr('data-expiration')){
					var expirationTimestamp = parseInt($el.attr('data-expiration'));
					fileInfo.shares = [];
					fileInfo.shares.push({expiration: expirationTimestamp});
				}

				return fileInfo;
			};

			var oldGetWebdavProperties = fileList._getWebdavProperties;
			fileList._getWebdavProperties = function() {
				var props = oldGetWebdavProperties.apply(this, arguments);
				props.push(OC.Files.Client.PROPERTY_OWNER_ID);
				props.push(OC.Files.Client.PROPERTY_OWNER_DISPLAY_NAME);
				props.push(OC.Files.Client.PROPERTY_SHARE_TYPES);
				return props;
			};

			fileList.filesClient.addFileInfoParser(function(response) {
				var data = {};
				var props = response.propStat[0].properties;
				var permissionsProp = props[OC.Files.Client.PROPERTY_PERMISSIONS];

				if (permissionsProp && permissionsProp.indexOf('S') >= 0) {
					data.shareOwner = props[OC.Files.Client.PROPERTY_OWNER_DISPLAY_NAME];
					data.shareOwnerId = props[OC.Files.Client.PROPERTY_OWNER_ID];
				}

				var shareTypesProp = props[OC.Files.Client.PROPERTY_SHARE_TYPES];
				if (shareTypesProp) {
					data.shareTypes = _.chain(shareTypesProp).filter(function(xmlvalue) {
						return (xmlvalue.namespaceURI === OC.Files.Client.NS_OWNCLOUD && xmlvalue.nodeName.split(':')[1] === 'share-type');
					}).map(function(xmlvalue) {
						return parseInt(xmlvalue.textContent || xmlvalue.text, 10);
					}).value();
				}

				return data;
			});

			// use delegate to catch the case with multiple file lists
			fileList.$el.on('fileActionsReady', function(ev){
				var $files = ev.$files;

				_.each($files, function(file) {
					var $tr = $(file);
					var shareTypes = $tr.attr('data-share-types') || '';
					var shareOwner = $tr.attr('data-share-owner');
					if (shareTypes || shareOwner) {
						var hasLink = false;
						var hasShares = false;
						_.each(shareTypes.split(',') || [], function(shareType) {
							shareType = parseInt(shareType, 10);
							if (shareType === OC.Share.SHARE_TYPE_LINK) {
								hasLink = true;
							} else if (shareType === OC.Share.SHARE_TYPE_EMAIL) {
								hasLink = true;
							} else if (shareType === OC.Share.SHARE_TYPE_USER) {
								hasShares = true;
							} else if (shareType === OC.Share.SHARE_TYPE_GROUP) {
								hasShares = true;
							} else if (shareType === OC.Share.SHARE_TYPE_REMOTE) {
								hasShares = true;
							} else if (shareType === OC.Share.SHARE_TYPE_CIRCLE) {
								hasShares = true;
							} else if (shareType === OC.Share.SHARE_TYPE_ROOM) {
								hasShares = true;
							}
						});
						OCA.Sharing.Util._updateFileActionIcon($tr, hasShares, hasLink);
					}
				});
			});


			fileList.$el.on('changeDirectory', function() {
				OCA.Sharing.sharesLoaded = false;
			});

			fileActions.registerAction({
				name: 'Share',
				displayName: '',
				altText: t('core', 'Share'),
				mime: 'all',
				permissions: OC.PERMISSION_ALL,
				iconClass: 'icon-shared',
				type: OCA.Files.FileActions.TYPE_INLINE,
				actionHandler: function(fileName, context) {
					// do not open sidebar if permission is set and equal to 0
					var permissions = parseInt(context.$file.data('share-permissions'), 10);
					if (isNaN(permissions) || permissions > 0) {
						fileList.showDetailsView(fileName, 'shareTabView');
					}
				},
				render: function(actionSpec, isDefault, context) {
					var permissions = parseInt(context.$file.data('permissions'), 10);
					// if no share permissions but share owner exists, still show the link
					if ((permissions & OC.PERMISSION_SHARE) !== 0 || context.$file.attr('data-share-owner')) {
						return fileActions._defaultRenderAction.call(fileActions, actionSpec, isDefault, context);
					}
					// don't render anything
					return null;
				}
			});

			var shareTab = new OCA.Sharing.ShareTabView('shareTabView', {order: -20});
			// detect changes and change the matching list entry
			shareTab.on('sharesChanged', function(shareModel) {
				var fileInfoModel = shareModel.fileInfoModel;
				var $tr = fileList.findFileEl(fileInfoModel.get('name'));

				// We count email shares as link share
				var hasLinkShares = shareModel.hasLinkShares();
				shareModel.get('shares').forEach(function (share) {
					if (share.share_type === OC.Share.SHARE_TYPE_EMAIL) {
						hasLinkShares = true;
					}
				});

				OCA.Sharing.Util._updateFileListDataAttributes(fileList, $tr, shareModel);
				if (!OCA.Sharing.Util._updateFileActionIcon($tr, shareModel.hasUserShares(), hasLinkShares)) {
					// remove icon, if applicable
					OC.Share.markFileAsShared($tr, false, false);
				}

				// FIXME: this is too convoluted. We need to get rid of the above updates
				// and only ever update the model and let the events take care of rerendering
				fileInfoModel.set({
					shareTypes: shareModel.getShareTypes(),
					// in case markFileAsShared decided to change the icon,
					// we need to modify the model
					// (FIXME: yes, this is hacky)
					icon: $tr.attr('data-icon')
				});
			});
			fileList.registerTabView(shareTab);

			var breadCrumbSharingDetailView = new OCA.Sharing.ShareBreadCrumbView({shareTab: shareTab});
			fileList.registerBreadCrumbDetailView(breadCrumbSharingDetailView);
		},

		/**
		 * Update file list data attributes
		 */
		_updateFileListDataAttributes: function(fileList, $tr, shareModel) {
			// files app current cannot show recipients on load, so we don't update the
			// icon when changed for consistency
			if (fileList.id === 'files') {
				return;
			}
			var recipients = _.pluck(shareModel.get('shares'), 'share_with_displayname');
			// note: we only update the data attribute because updateIcon()
			if (recipients.length) {
				var recipientData = _.mapObject(shareModel.get('shares'), function (share) {
					return {shareWith: share.share_with, shareWithDisplayName: share.share_with_displayname};
				});
				$tr.attr('data-share-recipient-data', JSON.stringify(recipientData));
			}
			else {
				$tr.removeAttr('data-share-recipient-data');
			}
		},

		/**
		 * Update the file action share icon for the given file
		 *
		 * @param $tr file element of the file to update
		 * @param {boolean} hasUserShares true if a user share exists
		 * @param {boolean} hasLinkShares true if a link share exists
		 *
		 * @return {boolean} true if the icon was set, false otherwise
		 */
		_updateFileActionIcon: function($tr, hasUserShares, hasLinkShares) {
			// if the statuses are loaded already, use them for the icon
			// (needed when scrolling to the next page)
			if (hasUserShares || hasLinkShares || $tr.attr('data-share-recipient-data') || $tr.attr('data-share-owner')) {
				OC.Share.markFileAsShared($tr, true, hasLinkShares);
				return true;
			}
			return false;
		},

		/**
		 * @param {Array} fileData
		 * @returns {String}
		 */
		getSharePermissions: function(fileData) {
			return fileData.sharePermissions;
		}
	};
})();

OC.Plugins.register('OCA.Files.FileList', OCA.Sharing.Util);


/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* @global Handlebars */

(function() {
	var TEMPLATE =
		'<div>' +
		'<div class="dialogContainer"></div>' +
		'</div>';

	/**
	 * @memberof OCA.Sharing
	 */
	var ShareTabView = OCA.Files.DetailTabView.extend(
		/** @lends OCA.Sharing.ShareTabView.prototype */ {
		id: 'shareTabView',
		className: 'tab shareTabView',

		template: function(params) {
			return 	TEMPLATE;
		},

		getLabel: function() {
			return t('files_sharing', 'Sharing');
		},

		getIcon: function() {
			return 'icon-shared';
		},

		/**
		 * Renders this details view
		 */
		render: function() {
			var self = this;
			if (this._dialog) {
				// remove/destroy older instance
				this._dialog.model.off();
				this._dialog.remove();
				this._dialog = null;
			}

			if (this.model) {
				this.$el.html(this.template());

				if (_.isUndefined(this.model.get('sharePermissions'))) {
					this.model.set('sharePermissions', OCA.Sharing.Util.getSharePermissions(this.model.attributes));
				}

				// TODO: the model should read these directly off the passed fileInfoModel
				var attributes = {
					itemType: this.model.isDirectory() ? 'folder' : 'file',
				   	itemSource: this.model.get('id'),
					possiblePermissions: this.model.get('sharePermissions')
				};
				var configModel = new OC.Share.ShareConfigModel();
				var shareModel = new OC.Share.ShareItemModel(attributes, {
					configModel: configModel,
					fileInfoModel: this.model
				});
				this._dialog = new OC.Share.ShareDialogView({
					configModel: configModel,
					model: shareModel
				});
				this.$el.find('.dialogContainer').append(this._dialog.$el);
				this._dialog.render();
				this._dialog.model.fetch();
				this._dialog.model.on('change', function() {
					self.trigger('sharesChanged', shareModel);
				});
			} else {
				this.$el.empty();
				// TODO: render placeholder text?
			}
		}
	});

	OCA.Sharing.ShareTabView = ShareTabView;
})();



/* global Handlebars, OC */

/**
 * @copyright 2016 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2016 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

(function() {
	'use strict';

	var BreadCrumbView = OC.Backbone.View.extend({
		tagName: 'span',
		events: {
			click: '_onClick'
		},
		_dirInfo: undefined,

		/** @type OCA.Sharing.ShareTabView */
		_shareTab: undefined,

		initialize: function(options) {
			this._shareTab = options.shareTab;
		},

		render: function(data) {
			this._dirInfo = data.dirInfo || null;

			if (this._dirInfo !== null && (this._dirInfo.path !== '/' || this._dirInfo.name !== '')) {
				var isShared = data.dirInfo && data.dirInfo.shareTypes && data.dirInfo.shareTypes.length > 0;
				this.$el.removeClass('shared icon-public icon-shared');
				if (isShared) {
					this.$el.addClass('shared');
					if (data.dirInfo.shareTypes.indexOf(OC.Share.SHARE_TYPE_LINK) !== -1) {
						this.$el.addClass('icon-public');
					} else {
						this.$el.addClass('icon-shared');
					}
				} else {
					this.$el.addClass('icon-shared');
				}
				this.$el.show();
				this.delegateEvents();
			} else {
				this.$el.removeClass('shared icon-public icon-shared');
				this.$el.hide();
			}

			return this;
		},
		_onClick: function(e) {
			e.preventDefault();

			var fileInfoModel = new OCA.Files.FileInfoModel(this._dirInfo);
			var self = this;
			fileInfoModel.on('change', function() {
				self.render({
					dirInfo: self._dirInfo
				});
			});
			this._shareTab.on('sharesChanged', function(shareModel) {
				var shareTypes = [];
				var shares = shareModel.getSharesWithCurrentItem();

				for(var i = 0; i < shares.length; i++) {
					if (shareTypes.indexOf(shares[i].share_type) === -1) {
						shareTypes.push(shares[i].share_type);
					}
				}

				if (shareModel.hasLinkShare()) {
					shareTypes.push(OC.Share.SHARE_TYPE_LINK);
				}

				// Since the dirInfo isn't updated we need to do this dark hackery
				self._dirInfo.shareTypes = shareTypes;

				self.render({
					dirInfo: self._dirInfo
				});
			});
			OCA.Files.App.fileList.showDetailsView(fileInfoModel, 'shareTabView');
		}
	});

	OCA.Sharing.ShareBreadCrumbView = BreadCrumbView;
})();


