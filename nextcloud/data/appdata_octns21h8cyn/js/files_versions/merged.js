/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global moment */

(function () {
	/**
	 * @memberof OCA.Versions
	 */
	var VersionModel = OC.Backbone.Model.extend({
		sync: OC.Backbone.davSync,

		davProperties: {
			'size': '{DAV:}getcontentlength',
			'mimetype': '{DAV:}getcontenttype',
			'timestamp': '{DAV:}getlastmodified',
		},

		/**
		 * Restores the original file to this revision
		 */
		revert: function (options) {
			options = options ? _.clone(options) : {};
			var model = this;

			var client = this.get('client');

			return client.move('/versions/' + this.get('fileId') + '/' + this.get('id'), '/restore/target', true)
				.done(function () {
					if (options.success) {
						options.success.call(options.context, model, {}, options);
					}
					model.trigger('revert', model, options);
				})
				.fail(function () {
					if (options.error) {
						options.error.call(options.context, model, {}, options);
					}
					model.trigger('error', model, {}, options);
				});
		},

		getFullPath: function () {
			return this.get('fullPath');
		},

		getPreviewUrl: function () {
			var url = OC.generateUrl('/apps/files_versions/preview');
			var params = {
				file: this.get('fullPath'),
				version: this.get('timestamp')
			};
			return url + '?' + OC.buildQueryString(params);
		},

		getDownloadUrl: function () {
			return OC.linkToRemoteBase('dav') + '/versions/' + this.get('user') + '/versions/' + this.get('fileId') + '/' + this.get('id');
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionModel = VersionModel;
})();



(function() {
  var template = Handlebars.template, templates = OCA.Versions.Templates = OCA.Versions.Templates || {};
templates['item'] = template({"1":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "				<div class=\"version-details\">\n					<span class=\"size has-tooltip\" title=\""
    + alias4(((helper = (helper = helpers.altSize || (depth0 != null ? depth0.altSize : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"altSize","hash":{},"data":data}) : helper)))
    + "\">"
    + alias4(((helper = (helper = helpers.humanReadableSize || (depth0 != null ? depth0.humanReadableSize : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"humanReadableSize","hash":{},"data":data}) : helper)))
    + "</span>\n				</div>\n";
},"3":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "			<a href=\"#\" class=\"revertVersion\" title=\""
    + alias4(((helper = (helper = helpers.revertLabel || (depth0 != null ? depth0.revertLabel : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"revertLabel","hash":{},"data":data}) : helper)))
    + "\"><img src=\""
    + alias4(((helper = (helper = helpers.revertIconUrl || (depth0 != null ? depth0.revertIconUrl : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"revertIconUrl","hash":{},"data":data}) : helper)))
    + "\" /></a>\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, helper, options, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression, alias5=helpers.blockHelperMissing, buffer = 
  "<li data-revision=\""
    + alias4(((helper = (helper = helpers.timestamp || (depth0 != null ? depth0.timestamp : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"timestamp","hash":{},"data":data}) : helper)))
    + "\">\n	<div>\n		<div class=\"preview-container\">\n			<img class=\"preview\" src=\""
    + alias4(((helper = (helper = helpers.previewUrl || (depth0 != null ? depth0.previewUrl : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"previewUrl","hash":{},"data":data}) : helper)))
    + "\" width=\"44\" height=\"44\"/>\n		</div>\n		<div class=\"version-container\">\n			<div>\n				<a href=\""
    + alias4(((helper = (helper = helpers.downloadUrl || (depth0 != null ? depth0.downloadUrl : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"downloadUrl","hash":{},"data":data}) : helper)))
    + "\" class=\"downloadVersion\" download=\""
    + alias4(((helper = (helper = helpers.downloadName || (depth0 != null ? depth0.downloadName : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"downloadName","hash":{},"data":data}) : helper)))
    + "\"><img src=\""
    + alias4(((helper = (helper = helpers.downloadIconUrl || (depth0 != null ? depth0.downloadIconUrl : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"downloadIconUrl","hash":{},"data":data}) : helper)))
    + "\" />\n					<span class=\"versiondate has-tooltip live-relative-timestamp\" data-timestamp=\""
    + alias4(((helper = (helper = helpers.millisecondsTimestamp || (depth0 != null ? depth0.millisecondsTimestamp : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"millisecondsTimestamp","hash":{},"data":data}) : helper)))
    + "\" title=\""
    + alias4(((helper = (helper = helpers.formattedTimestamp || (depth0 != null ? depth0.formattedTimestamp : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"formattedTimestamp","hash":{},"data":data}) : helper)))
    + "\">"
    + alias4(((helper = (helper = helpers.relativeTimestamp || (depth0 != null ? depth0.relativeTimestamp : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"relativeTimestamp","hash":{},"data":data}) : helper)))
    + "</span>\n				</a>\n			</div>\n";
  stack1 = ((helper = (helper = helpers.hasDetails || (depth0 != null ? depth0.hasDetails : depth0)) != null ? helper : alias2),(options={"name":"hasDetails","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data}),(typeof helper === alias3 ? helper.call(alias1,options) : helper));
  if (!helpers.hasDetails) { stack1 = alias5.call(depth0,stack1,options)}
  if (stack1 != null) { buffer += stack1; }
  buffer += "		</div>\n";
  stack1 = ((helper = (helper = helpers.canRevert || (depth0 != null ? depth0.canRevert : depth0)) != null ? helper : alias2),(options={"name":"canRevert","hash":{},"fn":container.program(3, data, 0),"inverse":container.noop,"data":data}),(typeof helper === alias3 ? helper.call(alias1,options) : helper));
  if (!helpers.canRevert) { stack1 = alias5.call(depth0,stack1,options)}
  if (stack1 != null) { buffer += stack1; }
  return buffer + "	</div>\n</li>\n";
},"useData":true});
templates['template'] = template({"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<ul class=\"versions\"></ul>\n<div class=\"clear-float\"></div>\n<div class=\"empty hidden\">\n	<div class=\"emptycontent\">\n		<div class=\"icon-history\"></div>\n		<p>"
    + alias4(((helper = (helper = helpers.emptyResultLabel || (depth0 != null ? depth0.emptyResultLabel : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"emptyResultLabel","hash":{},"data":data}) : helper)))
    + "</p>\n	</div>\n</div>\n<input type=\"button\" class=\"showMoreVersions hidden\" value=\""
    + alias4(((helper = (helper = helpers.moreVersionsLabel || (depth0 != null ? depth0.moreVersionsLabel : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"moreVersionsLabel","hash":{},"data":data}) : helper)))
    + "\" name=\"show-more-versions\" id=\"show-more-versions\" />\n<div class=\"loading hidden\" style=\"height: 50px\"></div>\n";
},"useData":true});
})();

/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function () {
	/**
	 * @memberof OCA.Versions
	 */
	var VersionCollection = OC.Backbone.Collection.extend({
		model: OCA.Versions.VersionModel,
		sync: OC.Backbone.davSync,

		/**
		 * @var OCA.Files.FileInfoModel
		 */
		_fileInfo: null,

		_currentUser: null,

		_client: null,

		setFileInfo: function (fileInfo) {
			this._fileInfo = fileInfo;
		},

		getFileInfo: function () {
			return this._fileInfo;
		},

		setCurrentUser: function(user) {
			this._currentUser = user;
		},

		getCurrentUser: function() {
			return this._currentUser || OC.getCurrentUser().uid;
		},

		setClient: function(client) {
			this._client = client;
		},

		getClient: function() {
			return this._client || new OC.Files.Client({
				host: OC.getHost(),
				root: OC.linkToRemoteBase('dav') + '/versions/' + this.getCurrentUser(),
				useHTTPS: OC.getProtocol() === 'https'
			});
		},

		url: function () {
			return OC.linkToRemoteBase('dav') + '/versions/' + this.getCurrentUser() + '/versions/' + this._fileInfo.get('id');
		},

		parse: function(result) {
			var fullPath = this._fileInfo.getFullPath();
			var fileId = this._fileInfo.get('id');
			var name = this._fileInfo.get('name');
			var user = this.getCurrentUser();
			var client = this.getClient();
			return _.map(result, function(version) {
				version.fullPath = fullPath;
				version.fileId = fileId;
				version.name = name;
				version.timestamp = parseInt(moment(new Date(version.timestamp)).format('X'), 10);
				version.id = parseInt(OC.basename(version.href), 10);
				version.size = parseInt(version.size, 10);
				version.user = user;
				version.client = client;
				return version;
			});
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionCollection = VersionCollection;
})();



/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	/**
	 * @memberof OCA.Versions
	 */
	var VersionsTabView = OCA.Files.DetailTabView.extend(/** @lends OCA.Versions.VersionsTabView.prototype */{
		id: 'versionsTabView',
		className: 'tab versionsTabView',

		_template: null,

		$versionsContainer: null,

		events: {
			'click .revertVersion': '_onClickRevertVersion'
		},

		initialize: function() {
			OCA.Files.DetailTabView.prototype.initialize.apply(this, arguments);
			this.collection = new OCA.Versions.VersionCollection();
			this.collection.on('request', this._onRequest, this);
			this.collection.on('sync', this._onEndRequest, this);
			this.collection.on('update', this._onUpdate, this);
			this.collection.on('error', this._onError, this);
			this.collection.on('add', this._onAddModel, this);
		},

		getLabel: function() {
			return t('files_versions', 'Versions');
		},

		getIcon: function() {
			return 'icon-history';
		},

		nextPage: function() {
			if (this._loading) {
				return;
			}

			if (this.collection.getFileInfo() && this.collection.getFileInfo().isDirectory()) {
				return;
			}
			this.collection.fetch();
		},

		_onClickRevertVersion: function(ev) {
			var self = this;
			var $target = $(ev.target);
			var fileInfoModel = this.collection.getFileInfo();
			var revision;
			if (!$target.is('li')) {
				$target = $target.closest('li');
			}

			ev.preventDefault();
			revision = $target.attr('data-revision');

			var versionModel = this.collection.get(revision);
			versionModel.revert({
				success: function() {
					// reset and re-fetch the updated collection
					self.$versionsContainer.empty();
					self.collection.setFileInfo(fileInfoModel);
					self.collection.reset([], {silent: true});
					self.collection.fetch();

					self.$el.find('.versions').removeClass('hidden');

					// update original model
					fileInfoModel.trigger('busy', fileInfoModel, false);
					fileInfoModel.set({
						size: versionModel.get('size'),
						mtime: versionModel.get('timestamp') * 1000,
						// temp dummy, until we can do a PROPFIND
						etag: versionModel.get('id') + versionModel.get('timestamp')
					});
				},

				error: function() {
					fileInfoModel.trigger('busy', fileInfoModel, false);
					self.$el.find('.versions').removeClass('hidden');
					self._toggleLoading(false);
					OC.Notification.show(t('files_version', 'Failed to revert {file} to revision {timestamp}.',
						{
							file: versionModel.getFullPath(),
							timestamp: OC.Util.formatDate(versionModel.get('timestamp') * 1000)
						}),
						{
							type: 'error'
						}
					);
				}
			});

			// spinner
			this._toggleLoading(true);
			fileInfoModel.trigger('busy', fileInfoModel, true);
		},

		_toggleLoading: function(state) {
			this._loading = state;
			this.$el.find('.loading').toggleClass('hidden', !state);
		},

		_onRequest: function() {
			this._toggleLoading(true);
		},

		_onEndRequest: function() {
			this._toggleLoading(false);
			this.$el.find('.empty').toggleClass('hidden', !!this.collection.length);
		},

		_onAddModel: function(model) {
			var $el = $(this.itemTemplate(this._formatItem(model)));
			this.$versionsContainer.append($el);
			$el.find('.has-tooltip').tooltip();
		},

		template: function(data) {
			return OCA.Versions.Templates['template'](data);
		},

		itemTemplate: function(data) {
			return OCA.Versions.Templates['item'](data);
		},

		setFileInfo: function(fileInfo) {
			if (fileInfo) {
				this.render();
				this.collection.setFileInfo(fileInfo);
				this.collection.reset([], {silent: true});
				this.nextPage();
			} else {
				this.render();
				this.collection.reset();
			}
		},

		_formatItem: function(version) {
			var timestamp = version.get('timestamp') * 1000;
			var size = version.has('size') ? version.get('size') : 0;
			var preview = OC.MimeType.getIconUrl(version.get('mimetype'));
			var img = new Image();
			img.onload = function () {
				$('li[data-revision=' + version.get('timestamp') + '] .preview').attr('src', version.getPreviewUrl());
			};
			img.src = version.getPreviewUrl();

			return _.extend({
				versionId: version.get('id'),
				formattedTimestamp: OC.Util.formatDate(timestamp),
				relativeTimestamp: OC.Util.relativeModifiedDate(timestamp),
				millisecondsTimestamp: timestamp,
				humanReadableSize: OC.Util.humanFileSize(size, true),
				altSize: n('files', '%n byte', '%n bytes', size),
				hasDetails: version.has('size'),
				downloadUrl: version.getDownloadUrl(),
				downloadIconUrl: OC.imagePath('core', 'actions/download'),
				downloadName: version.get('name'),
				revertIconUrl: OC.imagePath('core', 'actions/history'),
				previewUrl: preview,
				revertLabel: t('files_versions', 'Restore'),
				canRevert: (this.collection.getFileInfo().get('permissions') & OC.PERMISSION_UPDATE) !== 0
			}, version.attributes);
		},

		/**
		 * Renders this details view
		 */
		render: function() {
			this.$el.html(this.template({
				emptyResultLabel: t('files_versions', 'No other versions available'),
			}));
			this.$el.find('.has-tooltip').tooltip();
			this.$versionsContainer = this.$el.find('ul.versions');
			this.delegateEvents();
		},

		/**
		 * Returns true for files, false for folders.
		 *
		 * @return {bool} true for files, false for folders
		 */
		canDisplay: function(fileInfo) {
			if (!fileInfo) {
				return false;
			}
			return !fileInfo.isDirectory();
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionsTabView = VersionsTabView;
})();


/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	OCA.Versions = OCA.Versions || {};

	/**
	 * @namespace
	 */
	OCA.Versions.Util = {
		/**
		 * Initialize the versions plugin.
		 *
		 * @param {OCA.Files.FileList} fileList file list to be extended
		 */
		attach: function(fileList) {
			if (fileList.id === 'trashbin' || fileList.id === 'files.public') {
				return;
			}

			fileList.registerTabView(new OCA.Versions.VersionsTabView('versionsTabView', {order: -10}));
		}
	};
})();

OC.Plugins.register('OCA.Files.FileList', OCA.Versions.Util);



