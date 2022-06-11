/*
 * Copyright (c) 2016 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	if (!OCA.Comments) {
		/**
		 * @namespace
		 */
		OCA.Comments = {};
	}

})();



(function() {
  var template = Handlebars.template, templates = OCA.Comments.Templates = OCA.Comments.Templates || {};
templates['comment'] = template({"1":function(container,depth0,helpers,partials,data) {
    return " unread";
},"3":function(container,depth0,helpers,partials,data) {
    return " collapsed";
},"5":function(container,depth0,helpers,partials,data) {
    return " currentUser";
},"7":function(container,depth0,helpers,partials,data) {
    var helper;

  return "data-username=\""
    + container.escapeExpression(((helper = (helper = helpers.actorId || (depth0 != null ? depth0.actorId : depth0)) != null ? helper : helpers.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"actorId","hash":{},"data":data}) : helper)))
    + "\"";
},"9":function(container,depth0,helpers,partials,data) {
    return "			<a href=\"#\" class=\"action more icon icon-more has-tooltip\"></a>\n			<div class=\"deleteLoading icon-loading-small hidden\"></div>\n";
},"11":function(container,depth0,helpers,partials,data) {
    return "		<div class=\"message-overlay\"></div>\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<li class=\"comment"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isUnread : depth0),{"name":"if","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isLong : depth0),{"name":"if","hash":{},"fn":container.program(3, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "\" data-id=\""
    + alias4(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\n	<div class=\"authorRow\">\n		<div class=\"avatar"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isUserAuthor : depth0),{"name":"if","hash":{},"fn":container.program(5, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "\" "
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.actorId : depth0),{"name":"if","hash":{},"fn":container.program(7, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "> </div>\n		<div class=\"author"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isUserAuthor : depth0),{"name":"if","hash":{},"fn":container.program(5, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "\">"
    + alias4(((helper = (helper = helpers.actorDisplayName || (depth0 != null ? depth0.actorDisplayName : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"actorDisplayName","hash":{},"data":data}) : helper)))
    + "</div>\n"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isUserAuthor : depth0),{"name":"if","hash":{},"fn":container.program(9, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "		<div class=\"date has-tooltip live-relative-timestamp\" data-timestamp=\""
    + alias4(((helper = (helper = helpers.timestamp || (depth0 != null ? depth0.timestamp : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"timestamp","hash":{},"data":data}) : helper)))
    + "\" title=\""
    + alias4(((helper = (helper = helpers.altDate || (depth0 != null ? depth0.altDate : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"altDate","hash":{},"data":data}) : helper)))
    + "\">"
    + alias4(((helper = (helper = helpers.date || (depth0 != null ? depth0.date : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"date","hash":{},"data":data}) : helper)))
    + "</div>\n	</div>\n	<div class=\"message\">"
    + ((stack1 = ((helper = (helper = helpers.formattedMessage || (depth0 != null ? depth0.formattedMessage : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"formattedMessage","hash":{},"data":data}) : helper))) != null ? stack1 : "")
    + "</div>\n"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isLong : depth0),{"name":"if","hash":{},"fn":container.program(11, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "</li>\n";
},"useData":true});
templates['commentsmodifymenu'] = template({"1":function(container,depth0,helpers,partials,data) {
    var stack1, helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "		<li>\n			<a href=\"#\" class=\"menuitem action "
    + alias4(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"name","hash":{},"data":data}) : helper)))
    + " permanent\" data-action=\""
    + alias4(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"name","hash":{},"data":data}) : helper)))
    + "\">\n"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.iconClass : depth0),{"name":"if","hash":{},"fn":container.program(2, data, 0),"inverse":container.program(4, data, 0),"data":data})) != null ? stack1 : "")
    + "				<span>"
    + alias4(((helper = (helper = helpers.displayName || (depth0 != null ? depth0.displayName : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"displayName","hash":{},"data":data}) : helper)))
    + "</span>\n			</a>\n		</li>\n";
},"2":function(container,depth0,helpers,partials,data) {
    var helper;

  return "					<span class=\"icon "
    + container.escapeExpression(((helper = (helper = helpers.iconClass || (depth0 != null ? depth0.iconClass : depth0)) != null ? helper : helpers.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"iconClass","hash":{},"data":data}) : helper)))
    + "\"></span>\n";
},"4":function(container,depth0,helpers,partials,data) {
    return "					<span class=\"no-icon\"></span>\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1;

  return "<ul>\n"
    + ((stack1 = helpers.each.call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.items : depth0),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "</ul>\n";
},"useData":true});
templates['edit_comment'] = template({"1":function(container,depth0,helpers,partials,data) {
    var helper;

  return "			<div class=\"action-container\">\n				<a href=\"#\" class=\"action cancel icon icon-close has-tooltip\" title=\""
    + container.escapeExpression(((helper = (helper = helpers.cancelText || (depth0 != null ? depth0.cancelText : depth0)) != null ? helper : helpers.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"cancelText","hash":{},"data":data}) : helper)))
    + "\"></a>\n			</div>\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<"
    + alias4(((helper = (helper = helpers.tag || (depth0 != null ? depth0.tag : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"tag","hash":{},"data":data}) : helper)))
    + " class=\"newCommentRow comment\" data-id=\""
    + alias4(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\n	<div class=\"authorRow\">\n		<div class=\"avatar currentUser\" data-username=\""
    + alias4(((helper = (helper = helpers.actorId || (depth0 != null ? depth0.actorId : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"actorId","hash":{},"data":data}) : helper)))
    + "\"></div>\n		<div class=\"author currentUser\">"
    + alias4(((helper = (helper = helpers.actorDisplayName || (depth0 != null ? depth0.actorDisplayName : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"actorDisplayName","hash":{},"data":data}) : helper)))
    + "</div>\n"
    + ((stack1 = helpers["if"].call(alias1,(depth0 != null ? depth0.isEditMode : depth0),{"name":"if","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "	</div>\n	<form class=\"newCommentForm\">\n		<div contentEditable=\"true\" class=\"message\" data-placeholder=\""
    + alias4(((helper = (helper = helpers.newMessagePlaceholder || (depth0 != null ? depth0.newMessagePlaceholder : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"newMessagePlaceholder","hash":{},"data":data}) : helper)))
    + "\">"
    + alias4(((helper = (helper = helpers.message || (depth0 != null ? depth0.message : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"message","hash":{},"data":data}) : helper)))
    + "</div>\n		<input class=\"submit icon-confirm has-tooltip\" type=\"submit\" value=\"\" title=\""
    + alias4(((helper = (helper = helpers.submitText || (depth0 != null ? depth0.submitText : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"submitText","hash":{},"data":data}) : helper)))
    + "\"/>\n		<div class=\"submitLoading icon-loading-small hidden\"></div>\n	</form>\n</"
    + alias4(((helper = (helper = helpers.tag || (depth0 != null ? depth0.tag : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"tag","hash":{},"data":data}) : helper)))
    + ">\n";
},"useData":true});
templates['filesplugin'] = template({"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<a class=\"action action-comment permanent\" title=\""
    + alias4(((helper = (helper = helpers.countMessage || (depth0 != null ? depth0.countMessage : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"countMessage","hash":{},"data":data}) : helper)))
    + "\" href=\"#\">\n	<img class=\"svg\" src=\""
    + alias4(((helper = (helper = helpers.iconUrl || (depth0 != null ? depth0.iconUrl : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"iconUrl","hash":{},"data":data}) : helper)))
    + "\"/>\n</a>\n";
},"useData":true});
templates['view'] = template({"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<ul class=\"comments\">\n</ul>\n<div class=\"emptycontent hidden\"><div class=\"icon-comment\"></div>\n	<p>"
    + alias4(((helper = (helper = helpers.emptyResultLabel || (depth0 != null ? depth0.emptyResultLabel : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"emptyResultLabel","hash":{},"data":data}) : helper)))
    + "</p></div>\n<input type=\"button\" class=\"showMore hidden\" value=\""
    + alias4(((helper = (helper = helpers.moreLabel || (depth0 != null ? depth0.moreLabel : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"moreLabel","hash":{},"data":data}) : helper)))
    + "\" name=\"show-more\" id=\"show-more\" />\n<div class=\"loading hidden\" style=\"height: 50px\"></div>\n";
},"useData":true});
})();

/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {

	_.extend(OC.Files.Client, {
		PROPERTY_FILEID:	'{' + OC.Files.Client.NS_OWNCLOUD + '}id',
		PROPERTY_MESSAGE: 	'{' + OC.Files.Client.NS_OWNCLOUD + '}message',
		PROPERTY_ACTORTYPE:	'{' + OC.Files.Client.NS_OWNCLOUD + '}actorType',
		PROPERTY_ACTORID:	'{' + OC.Files.Client.NS_OWNCLOUD + '}actorId',
		PROPERTY_ISUNREAD:	'{' + OC.Files.Client.NS_OWNCLOUD + '}isUnread',
		PROPERTY_OBJECTID:	'{' + OC.Files.Client.NS_OWNCLOUD + '}objectId',
		PROPERTY_OBJECTTYPE:	'{' + OC.Files.Client.NS_OWNCLOUD + '}objectType',
		PROPERTY_ACTORDISPLAYNAME:	'{' + OC.Files.Client.NS_OWNCLOUD + '}actorDisplayName',
		PROPERTY_CREATIONDATETIME:	'{' + OC.Files.Client.NS_OWNCLOUD + '}creationDateTime',
		PROPERTY_MENTIONS: '{' + OC.Files.Client.NS_OWNCLOUD + '}mentions'
	});

	/**
	 * @class OCA.Comments.CommentModel
	 * @classdesc
	 *
	 * Comment
	 *
	 */
	var CommentModel = OC.Backbone.Model.extend(
		/** @lends OCA.Comments.CommentModel.prototype */ {
		sync: OC.Backbone.davSync,

		defaults: {
			actorType: 'users',
			objectType: 'files'
		},

		davProperties: {
			'id':	OC.Files.Client.PROPERTY_FILEID,
			'message':	OC.Files.Client.PROPERTY_MESSAGE,
			'actorType':	OC.Files.Client.PROPERTY_ACTORTYPE,
			'actorId':	OC.Files.Client.PROPERTY_ACTORID,
			'actorDisplayName':	OC.Files.Client.PROPERTY_ACTORDISPLAYNAME,
			'creationDateTime':	OC.Files.Client.PROPERTY_CREATIONDATETIME,
			'objectType':	OC.Files.Client.PROPERTY_OBJECTTYPE,
			'objectId':	OC.Files.Client.PROPERTY_OBJECTID,
			'isUnread':	OC.Files.Client.PROPERTY_ISUNREAD,
			'mentions': OC.Files.Client.PROPERTY_MENTIONS
		},

		parse: function(data) {
			return {
				id: data.id,
				message: data.message,
				actorType: data.actorType,
				actorId: data.actorId,
				actorDisplayName: data.actorDisplayName,
				creationDateTime: data.creationDateTime,
				objectType: data.objectType,
				objectId: data.objectId,
				isUnread: (data.isUnread === 'true'),
				mentions: this._parseMentions(data.mentions)
			};
		},

		_parseMentions: function(mentions) {
			if(_.isUndefined(mentions)) {
				return {};
			}
			var result = {};
			for(var i in mentions) {
				var mention = mentions[i];
				if(_.isUndefined(mention.localName) || mention.localName !== 'mention') {
					continue;
				}
				result[i] = {};
				for (var child = mention.firstChild; child; child = child.nextSibling) {
					if(_.isUndefined(child.localName) || !child.localName.startsWith('mention')) {
						continue;
					}
					result[i][child.localName] = child.textContent;
				}
			}
			return result;
		}
	});

	OCA.Comments.CommentModel = CommentModel;
})(OC, OCA);


/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {

	/**
	 * @class OCA.Comments.CommentCollection
	 * @classdesc
	 *
	 * Collection of comments assigned to a file
	 *
	 */
	var CommentCollection = OC.Backbone.Collection.extend(
		/** @lends OCA.Comments.CommentCollection.prototype */ {

		sync: OC.Backbone.davSync,

		model: OCA.Comments.CommentModel,

		/**
		 * Object type
		 *
		 * @type string
		 */
		_objectType: 'files',

		/**
		 * Object id
		 *
		 * @type string
		 */
		_objectId: null,

		/**
		 * True if there are no more page results left to fetch
		 *
		 * @type bool
		 */
		_endReached: false,

		/**
		 * Number of comments to fetch per page
		 *
		 * @type int
		 */
		_limit : 20,

		/**
		 * Initializes the collection
		 *
		 * @param {string} [options.objectType] object type
		 * @param {string} [options.objectId] object id
		 */
		initialize: function(models, options) {
			options = options || {};
			if (options.objectType) {
				this._objectType = options.objectType;
			}
			if (options.objectId) {
				this._objectId = options.objectId;
			}
		},

		url: function() {
			return OC.linkToRemote('dav') + '/comments/' +
				encodeURIComponent(this._objectType) + '/' +
				encodeURIComponent(this._objectId) + '/';
		},

		setObjectId: function(objectId) {
			this._objectId = objectId;
		},

		hasMoreResults: function() {
			return !this._endReached;
		},

		reset: function() {
			this._endReached = false;
			this._summaryModel = null;
			return OC.Backbone.Collection.prototype.reset.apply(this, arguments);
		},

		/**
		 * Fetch the next set of results
		 */
		fetchNext: function(options) {
			var self = this;
			if (!this.hasMoreResults()) {
				return null;
			}

			var body = '<?xml version="1.0" encoding="utf-8" ?>\n' +
				'<oc:filter-comments xmlns:D="DAV:" xmlns:oc="http://owncloud.org/ns">\n' +
				// load one more so we know there is more
				'    <oc:limit>' + (this._limit + 1) + '</oc:limit>\n' +
				'    <oc:offset>' + this.length + '</oc:offset>\n' +
				'</oc:filter-comments>\n';

			options = options || {};
			var success = options.success;
			options = _.extend({
				remove: false,
				parse: true,
				data: body,
				davProperties: CommentCollection.prototype.model.prototype.davProperties,
				success: function(resp) {
					if (resp.length <= self._limit) {
						// no new entries, end reached
						self._endReached = true;
					} else {
						// remove last entry, for next page load
						resp = _.initial(resp);
					}
					if (!self.set(resp, options)) {
						return false;
					}
					if (success) {
						success.apply(null, arguments);
					}
					self.trigger('sync', 'REPORT', self, options);
				}
			}, options);

			return this.sync('REPORT', this, options);
		},

		/**
		 * Returns the matching summary model
		 *
		 * @return {OCA.Comments.CommentSummaryModel} summary model
		 */
		getSummaryModel: function() {
			if (!this._summaryModel) {
				this._summaryModel = new OCA.Comments.CommentSummaryModel({
					id: this._objectId,
					objectType: this._objectType
				});
			}
			return this._summaryModel;
		},

		/**
		 * Updates the read marker for this comment thread
		 *
		 * @param {Date} [date] optional date, defaults to now
		 * @param {Object} [options] backbone options
		 */
		updateReadMarker: function(date, options) {
			options = options || {};

			return this.getSummaryModel().save({
				readMarker: (date || new Date()).toUTCString()
			}, options);
		}
	});

	OCA.Comments.CommentCollection = CommentCollection;
})(OC, OCA);



/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {

	_.extend(OC.Files.Client, {
		PROPERTY_READMARKER:	'{' + OC.Files.Client.NS_OWNCLOUD + '}readMarker'
	});

	/**
	 * @class OCA.Comments.CommentSummaryModel
	 * @classdesc
	 *
	 * Model containing summary information related to comments
	 * like the read marker.
	 *
	 */
	var CommentSummaryModel = OC.Backbone.Model.extend(
		/** @lends OCA.Comments.CommentSummaryModel.prototype */ {
		sync: OC.Backbone.davSync,

		/**
		 * Object type
		 *
		 * @type string
		 */
		_objectType: 'files',

		/**
		 * Object id
		 *
		 * @type string
		 */
		_objectId: null,

		davProperties: {
			'readMarker': OC.Files.Client.PROPERTY_READMARKER
		},

		/**
		 * Initializes the summary model
		 *
		 * @param {string} [options.objectType] object type
		 * @param {string} [options.objectId] object id
		 */
		initialize: function(attrs, options) {
			options = options || {};
			if (options.objectType) {
				this._objectType = options.objectType;
			}
		},

		url: function() {
			return OC.linkToRemote('dav') + '/comments/' +
				encodeURIComponent(this._objectType) + '/' +
				encodeURIComponent(this.id) + '/';
		}
	});

	OCA.Comments.CommentSummaryModel = CommentSummaryModel;
})(OC, OCA);


/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global Handlebars, escapeHTML */

(function(OC, OCA) {

	/**
	 * @memberof OCA.Comments
	 */
	var CommentsTabView = OCA.Files.DetailTabView.extend(
		/** @lends OCA.Comments.CommentsTabView.prototype */ {
		id: 'commentsTabView',
		className: 'tab commentsTabView',
		_autoCompleteData: undefined,
		_commentsModifyMenu: undefined,

		events: {
			'submit .newCommentForm': '_onSubmitComment',
			'click .showMore': '_onClickShowMore',
			'click .cancel': '_onClickCloseComment',
			'click .comment': '_onClickComment',
			'keyup div.message': '_onTextChange',
			'change div.message': '_onTextChange',
			'input div.message': '_onTextChange',
			'paste div.message': '_onPaste'
		},

		_commentMaxLength: 1000,

		initialize: function() {
			OCA.Files.DetailTabView.prototype.initialize.apply(this, arguments);
			this.collection = new OCA.Comments.CommentCollection();
			this.collection.on('request', this._onRequest, this);
			this.collection.on('sync', this._onEndRequest, this);
			this.collection.on('add', this._onAddModel, this);
			this.collection.on('change:message', this._onChangeModel, this);

			this._commentMaxThreshold = this._commentMaxLength * 0.9;

			// TODO: error handling
			_.bindAll(this, '_onTypeComment', '_initAutoComplete', '_onAutoComplete');
		},

		template: function(params) {
			var currentUser = OC.getCurrentUser();
			return OCA.Comments.Templates['view'](_.extend({
				actorId: currentUser.uid,
				actorDisplayName: currentUser.displayName
			}, params));
		},

		editCommentTemplate: function(params) {
			var currentUser = OC.getCurrentUser();
			return OCA.Comments.Templates['edit_comment'](_.extend({
				actorId: currentUser.uid,
				actorDisplayName: currentUser.displayName,
				newMessagePlaceholder: t('comments', 'New comment …'),
				submitText: t('comments', 'Post'),
				cancelText: t('comments', 'Cancel'),
				tag: 'li'
			}, params));
		},

		commentTemplate: function(params) {
			params = _.extend({
				editTooltip: t('comments', 'Edit comment'),
				isUserAuthor: OC.getCurrentUser().uid === params.actorId,
				isLong: this._isLong(params.message)
			}, params);

			if (params.actorType === 'deleted_users') {
				// makes the avatar a X
				params.actorId = null;
				params.actorDisplayName = t('comments', '[Deleted user]');
			}

			return OCA.Comments.Templates['comment'](params);
		},

		getLabel: function() {
			return t('comments', 'Comments');
		},

		getIcon: function() {
			return 'icon-comment';
		},

		setFileInfo: function(fileInfo) {
			if (fileInfo) {
				this.model = fileInfo;

				this.render();
				this._initAutoComplete($('#commentsTabView').find('.newCommentForm .message'));
				this.collection.setObjectId(this.model.id);
				// reset to first page
				this.collection.reset([], {silent: true});
				this.nextPage();
			} else {
				this.model = null;
				this.render();
				this.collection.reset();
			}
		},

		render: function() {
			this.$el.html(this.template({
				emptyResultLabel: t('comments', 'No comments yet, start the conversation!'),
				moreLabel: t('comments', 'More comments …')
			}));
			this.$el.find('.comments').before(this.editCommentTemplate({ tag: 'div'}));
			this.$el.find('.has-tooltip').tooltip();
			this.$container = this.$el.find('ul.comments');
			this.$el.find('.avatar').avatar(OC.getCurrentUser().uid, 32);
			this.delegateEvents();
			this.$el.find('.message').on('keydown input change', this._onTypeComment);

			autosize(this.$el.find('.newCommentRow .message'))
			this.$el.find('.newCommentForm .message').focus();	
		},

		_initAutoComplete: function($target) {
			var s = this;
			var limit = 10;
			if(!_.isUndefined(OC.appConfig.comments)) {
				limit = OC.appConfig.comments.maxAutoCompleteResults;
			}
			$target.atwho({
				at: '@',
				limit: limit,
				callbacks: {
					remoteFilter: s._onAutoComplete,
					highlighter: function (li) {
						// misuse the highlighter callback to instead of
						// highlighting loads the avatars.
						var $li = $(li);
						$li.find('.avatar').avatar(undefined, 32);
						return $li;
					},
					sorter: function (q, items) { return items; }
				},
				displayTpl: function (item) {
					return '<li>' +
						'<span class="avatar-name-wrapper">' +
							'<span class="avatar" ' +
									'data-username="' + escapeHTML(item.id) + '" ' + // for avatars
									'data-user="' + escapeHTML(item.id) + '" ' + // for contactsmenu
									'data-user-display-name="' + escapeHTML(item.label) + '">' +
							'</span>' +
							'<strong>' + escapeHTML(item.label) + '</strong>' +
						'</span></li>';
				},
				insertTpl: function (item) {
					return '' +
						'<span class="avatar-name-wrapper">' +
							'<span class="avatar" ' +
									'data-username="' + escapeHTML(item.id) + '" ' + // for avatars
									'data-user="' + escapeHTML(item.id) + '" ' + // for contactsmenu
									'data-user-display-name="' + escapeHTML(item.label) + '">' +
							'</span>' +
							'<strong>' + escapeHTML(item.label) + '</strong>' +
						'</span>';
				},
				searchKey: "label"
			});
			$target.on('inserted.atwho', function (je, $el) {
				var editionMode = true;
				s._postRenderItem(
					// we need to pass the parent of the inserted element
					// passing the whole comments form would re-apply and request
					// avatars from the server
					$(je.target).find(
						'span[data-username="' + $el.find('[data-username]').data('username') + '"]'
					).parent(),
					editionMode
				);
			});
		},

		_onAutoComplete: function(query, callback) {
			if(_.isEmpty(query)) {
				return;
			}
			var s = this;
			if(!_.isUndefined(this._autoCompleteRequestTimer)) {
				clearTimeout(this._autoCompleteRequestTimer);
			}
			this._autoCompleteRequestTimer = _.delay(function() {
				if(!_.isUndefined(this._autoCompleteRequestCall)) {
					this._autoCompleteRequestCall.abort();
				}
				this._autoCompleteRequestCall = $.ajax({
					url: OC.linkToOCS('core', 2) + 'autocomplete/get',
					data: {
						search: query,
						itemType: 'files',
						itemId: s.model.get('id'),
						sorter: 'commenters|share-recipients',
						limit: OC.appConfig.comments.maxAutoCompleteResults
					},
					beforeSend: function (request) {
						request.setRequestHeader('Accept', 'application/json');
					},
					success: function (result) {
						callback(result.ocs.data);
					}
				});
			}, 400);
		},

		_formatItem: function(commentModel) {
			var timestamp = new Date(commentModel.get('creationDateTime')).getTime();
			var data = _.extend({
				timestamp: timestamp,
				date: OC.Util.relativeModifiedDate(timestamp),
				altDate: OC.Util.formatDate(timestamp),
				formattedMessage: this._formatMessage(commentModel.get('message'), commentModel.get('mentions'))
			}, commentModel.attributes);
			return data;
		},

		_toggleLoading: function(state) {
			this._loading = state;
			this.$el.find('.loading').toggleClass('hidden', !state);
		},

		_onRequest: function(type) {
			if (type === 'REPORT') {
				this._toggleLoading(true);
				this.$el.find('.showMore').addClass('hidden');
			}
		},

		_onEndRequest: function(type) {
			var fileInfoModel = this.model;
			this._toggleLoading(false);
			this.$el.find('.emptycontent').toggleClass('hidden', !!this.collection.length);
			this.$el.find('.showMore').toggleClass('hidden', !this.collection.hasMoreResults());

			if (type !== 'REPORT') {
				return;
			}

			// find first unread comment
			var firstUnreadComment = this.collection.findWhere({isUnread: true});
			if (firstUnreadComment) {
				// update read marker
				this.collection.updateReadMarker(
					null,
					{
						success: function() {
							fileInfoModel.set('commentsUnread', 0);
						}
					}
				);
			}
			this.$el.find('.newCommentForm .message').focus();	
			
		},

		/**
		 * takes care of post-rendering after a new comment was added to the
		 * collection
		 *
		 * @param model
		 * @param collection
		 * @param options
		 * @private
		 */
		_onAddModel: function(model, collection, options) {
			// we need to render it immediately, to ensure that the right
			// order of comments is kept on opening comments tab
			var $comment = $(this.commentTemplate(this._formatItem(model)));
			if (!_.isUndefined(options.at) && collection.length > 1) {
				this.$container.find('li').eq(options.at).before($comment);
			} else {
				this.$container.append($comment);
			}
			this._postRenderItem($comment);
			$('#commentsTabView').find('.newCommentForm div.message').text('').prop('contenteditable', true);

			// we need to update the model, because it consists of client data
			// only, but the server might add meta data, e.g. about mentions
			var oldMentions = model.get('mentions');
			var self = this;
			model.fetch({
				success: function (model) {
					if(_.isEqual(oldMentions, model.get('mentions'))) {
						// don't attempt to render if unnecessary, avoids flickering
						return;
					}
					var $updated = $(self.commentTemplate(self._formatItem(model)));
					$comment.html($updated.html());
					self._postRenderItem($comment);
				}
			})

		},

		/**
		 * takes care of post-rendering after a new comment was edited
		 *
		 * @param model
		 * @private
		 */
		_onChangeModel: function (model) {
			if(model.get('message').trim() === model.previous('message').trim()) {
				return;
			}

			var $form = this.$container.find('.comment[data-id="' + model.id + '"] form');
			var $row = $form.closest('.comment');
			var $target = $row.data('commentEl');
			if(_.isUndefined($target)) {
				// ignore noise – this is only set after editing a comment and hitting post
				return;
			}
			var self = this;

			// we need to update the model, because it consists of client data
			// only, but the server might add meta data, e.g. about mentions
			model.fetch({
				success: function (model) {
					$target.removeClass('hidden');
					$row.remove();

					var $message = $target.find('.message');
					$message
						.html(self._formatMessage(model.get('message'), model.get('mentions')))
						.find('.avatar')
						.each(function () { $(this).avatar(); });
					self._postRenderItem($message);
				}
			});
		},

		_postRenderItem: function($el, editionMode) {
			$el.find('.has-tooltip').tooltip();
			var inlineAvatars = $el.find('.message .avatar');
			if ($($el.context).hasClass('message')) {
				inlineAvatars = $el.find('.avatar');
			}
			inlineAvatars.each(function () {
				var $this = $(this);
				$this.avatar($this.attr('data-username'), 16);
			});
			$el.find('.authorRow .avatar').each(function () {
				var $this = $(this);
				$this.avatar($this.attr('data-username'), 32);
			});

			var username = $el.find('.avatar').data('username');
			if (username !== oc_current_user) {
				$el.find('.authorRow .avatar, .authorRow .author').contactsMenu(
					username, 0, $el.find('.authorRow'));
			}

			var $message = $el.find('.message');
			if($message.length === 0) {
				// it is the case when writing a comment and mentioning a person
				$message = $el;
			}


			if (!editionMode) {
				var self = this;
				// add the dropdown menu to display the edit and delete option
				var modifyCommentMenu = new OCA.Comments.CommentsModifyMenu();
				$el.find('.authorRow').append(modifyCommentMenu.$el);
				$el.find('.more').on('click', _.bind(modifyCommentMenu.show, modifyCommentMenu));

				self.listenTo(modifyCommentMenu, 'select:menu-item-clicked', function(ev, action) {
					if (action === 'edit') {
						self._onClickEditComment(ev);
					} else if (action === 'delete') {
						self._onClickDeleteComment(ev);
					}
				});
			}

			this._postRenderMessage($message, editionMode);
		},

		_postRenderMessage: function($el, editionMode) {
			if (editionMode) {
				return;
			}

			$el.find('.avatar-name-wrapper').each(function() {
				var $this = $(this);
				var $avatar = $this.find('.avatar');

				var user = $avatar.data('user');
				if (user !== OC.getCurrentUser().uid) {
					$this.contactsMenu(user, 0, $this);
				}
			});
		},

		/**
		 * Convert a message to be displayed in HTML,
		 * converts newlines to <br> tags.
		 */
		_formatMessage: function(message, mentions, editMode) {
			message = escapeHTML(message).replace(/\n/g, '<br/>');

			for(var i in mentions) {
				if(!mentions.hasOwnProperty(i)) {
					return;
				}
				var mention = '@' + mentions[i].mentionId;
				if (mentions[i].mentionId.indexOf(' ') !== -1) {
					mention = _.escape('@"' + mentions[i].mentionId + '"');
				}

				// escape possible regex characters in the name
				mention = mention.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
				var regex = new RegExp("(^|\\s)(" + mention + ")\\b", 'g');
				if (mentions[i].mentionId.indexOf(' ') !== -1) {
					regex = new RegExp("(^|\\s)(" + mention + ")", 'g');
				}

				var displayName = this._composeHTMLMention(mentions[i].mentionId, mentions[i].mentionDisplayName);

				// replace every mention either at the start of the input or after a whitespace
				// followed by a non-word character.
				message = message.replace(regex,
					function(match, p1) {
						// to  get number of whitespaces (0 vs 1) right
						return p1+displayName;
					}
				);
			}
			if(editMode !== true) {
				message = OCP.Comments.plainToRich(message);
			}
			return message;
		},

		_composeHTMLMention: function(uid, displayName) {
			var avatar = '' +
				'<span class="avatar" ' +
						'data-username="' + _.escape(uid) + '" ' +
						'data-user="' + _.escape(uid) + '" ' +
						'data-user-display-name="' + _.escape(displayName) + '">' +
				'</span>';

			var isCurrentUser = (uid === OC.getCurrentUser().uid);

			return '' +
				'<span class="atwho-inserted" contenteditable="false">' +
					'<span class="avatar-name-wrapper' + (isCurrentUser ? ' currentUser' : '') + '">' +
						avatar +
						'<strong>' + _.escape(displayName) + '</strong>' +
					'</span>' +
				'</span>';
		},

		nextPage: function() {
			if (this._loading || !this.collection.hasMoreResults()) {
				return;
			}

			this.collection.fetchNext();
		},

		_onClickEditComment: function(ev) {
			ev.preventDefault();
			var $comment = $(ev.target).closest('.comment');
			var commentId = $comment.data('id');
			var commentToEdit = this.collection.get(commentId);
			var $formRow = $(this.editCommentTemplate(_.extend({
				isEditMode: true,
				submitText: t('comments', 'Save')
			}, commentToEdit.attributes)));

			$comment.addClass('hidden').removeClass('collapsed');
			// spawn form
			$comment.after($formRow);
			$formRow.data('commentEl', $comment);
			$formRow.find('.message').on('keydown input change', this._onTypeComment);

			// copy avatar element from original to avoid flickering
			$formRow.find('.avatar:first').replaceWith($comment.find('.avatar:first').clone());
			$formRow.find('.has-tooltip').tooltip();

			var $message = $formRow.find('.message');
			$message
				.html(this._formatMessage(commentToEdit.get('message'), commentToEdit.get('mentions'), true))
				.find('.avatar')
				.each(function () { $(this).avatar(); });
			var editionMode = true;
			this._postRenderItem($message, editionMode);

			// Enable autosize
			autosize($formRow.find('.message'));

			// enable autocomplete
			this._initAutoComplete($formRow.find('.message'));

			return false;
		},

		_onTypeComment: function(ev) {
			var $field = $(ev.target);
			var len = $field.text().length;
			var $submitButton = $field.data('submitButtonEl');
			if (!$submitButton) {
				$submitButton = $field.closest('form').find('.submit');
				$field.data('submitButtonEl', $submitButton);
			}
			$field.tooltip('hide');
			if (len > this._commentMaxThreshold) {
				$field.attr('data-original-title', t('comments', 'Allowed characters {count} of {max}', {count: len, max: this._commentMaxLength}));
				$field.tooltip({trigger: 'manual'});
				$field.tooltip('show');
				$field.addClass('error');
			}

			var limitExceeded = (len > this._commentMaxLength);
			$field.toggleClass('error', limitExceeded);
			$submitButton.prop('disabled', limitExceeded);

			// Submits form with Enter, but Shift+Enter is a new line. If the
			// autocomplete popover is being shown Enter does not submit the
			// form either; it will be handled by At.js which will add the
			// currently selected item to the message.
			if (ev.keyCode === 13 && !ev.shiftKey && !$field.atwho('isSelecting')) {
				$submitButton.click();
				ev.preventDefault();
			}
		},

		_onClickComment: function(ev) {
			var $row = $(ev.target);
			if (!$row.is('.comment')) {
				$row = $row.closest('.comment');
			}
			$row.removeClass('collapsed');
		},

		_onClickCloseComment: function(ev) {
			ev.preventDefault();
			var $row = $(ev.target).closest('.comment');
			$row.data('commentEl').removeClass('hidden');
			$row.remove();
			return false;
		},

		_onClickDeleteComment: function(ev) {
			ev.preventDefault();
			var $comment = $(ev.target).closest('.comment');
			var commentId = $comment.data('id');
			var $loading = $comment.find('.deleteLoading');
			var $moreIcon = $comment.find('.more');

			$comment.addClass('disabled');
			$loading.removeClass('hidden');
			$moreIcon.addClass('hidden');

			$comment.data('commentEl', $comment);

			this.collection.get(commentId).destroy({
				success: function() {
					$comment.data('commentEl').remove();
					$comment.remove();
				},
				error: function() {
					$loading.addClass('hidden');
					$moreIcon.removeClass('hidden');
					$comment.removeClass('disabled');

					OC.Notification.showTemporary(t('comments', 'Error occurred while retrieving comment with ID {id}', {id: commentId}));
				}
			});

			return false;
		},

		_onClickShowMore: function(ev) {
			ev.preventDefault();
			this.nextPage();
		},

		/**
		 * takes care of updating comment element states after submit (either new
		 * comment or edit).
		 *
		 * @param {OC.Backbone.Model} model
		 * @param {jQuery} $form
		 * @private
		 */
		_onSubmitSuccess: function(model, $form) {
			var $submit = $form.find('.submit');
			var $loading = $form.find('.submitLoading');

			$submit.removeClass('hidden');
			$loading.addClass('hidden');
		},

		_commentBodyHTML2Plain: function($el) {
			var $comment = $el.clone();

			$comment.find('.avatar-name-wrapper').each(function () {
				var $this = $(this),
					$inserted = $this.parent(),
					userId = $this.find('.avatar').data('username');
				if (userId.indexOf(' ') !== -1) {
					$inserted.html('@"' + userId + '"');
				} else {
					$inserted.html('@' + userId);
				}
			});

			$comment.html(OCP.Comments.richToPlain($comment.html()));

			var oldHtml;
			var html = $comment.html();
			do {
				// replace works one by one
				oldHtml = html;
				html = oldHtml.replace("<br>", "\n");	// preserve line breaks
			} while(oldHtml !== html);
			$comment.html(html);

			return $comment.text();
		},

		_onSubmitComment: function(e) {
			var self = this;
			var $form = $(e.target);
			var commentId = $form.closest('.comment').data('id');
			var currentUser = OC.getCurrentUser();
			var $submit = $form.find('.submit');
			var $loading = $form.find('.submitLoading');
			var $commentField = $form.find('.message');
			var message = $commentField.text().trim();
			e.preventDefault();

			if (!message.length || message.length > this._commentMaxLength) {
				return;
			}

			$commentField.prop('contenteditable', false);
			$submit.addClass('hidden');
			$loading.removeClass('hidden');

			message = this._commentBodyHTML2Plain($commentField);
			if (commentId) {
				// edit mode
				var comment = this.collection.get(commentId);
				comment.save({
					message: message
				}, {
					success: function(model) {
						self._onSubmitSuccess(model, $form);
						if(model.get('message').trim() === model.previous('message').trim()) {
							// model change event doesn't trigger, manually remove the row.
							var $row = $form.closest('.comment');
							$row.data('commentEl').removeClass('hidden');
							$row.remove();
						}
					},
					error: function() {
						self._onSubmitError($form, commentId);
					}
				});
			} else {
				this.collection.create({
					actorId: currentUser.uid,
					actorDisplayName: currentUser.displayName,
					actorType: 'users',
					verb: 'comment',
					message: message,
					creationDateTime: (new Date()).toUTCString()
				}, {
					at: 0,
					// wait for real creation before adding
					wait: true,
					success: function(model) {
						self._onSubmitSuccess(model, $form);
					},
					error: function() {
						self._onSubmitError($form, undefined);
					}
				});
			}

			return false;
		},

		/**
		 * takes care of updating the UI after an error on submit (either new
		 * comment or edit).
		 *
		 * @param {jQuery} $form
		 * @param {string|undefined} commentId
		 * @private
		 */
		_onSubmitError: function($form, commentId) {
			$form.find('.submit').removeClass('hidden');
			$form.find('.submitLoading').addClass('hidden');
			$form.find('.message').prop('contenteditable', true);

			if(!_.isUndefined(commentId)) {
				OC.Notification.show(t('comments', 'Error occurred while updating comment with id {id}', {id: commentId}), {type: 'error'});
			} else {
				OC.Notification.show(t('comments', 'Error occurred while posting comment'), {type: 'error'});
			}
		},

		/**
		 * ensures the contenteditable div is really empty, when user removed
		 * all input, so that the placeholder will be shown again
		 *
		 * @private
		 */
		_onTextChange: function() {
			var $message = $('#commentsTabView').find('.newCommentForm div.message');
			if(!$message.text().trim().length) {
				$message.empty();
			}
		},

		/**
		 * Limit pasting to plain text
		 *
		 * @param e
		 * @private
		 */
		_onPaste: function (e) {
			e.preventDefault();
			var text = e.originalEvent.clipboardData.getData("text/plain");
			document.execCommand('insertText', false, text);
		},

		/**
		 * Returns whether the given message is long and needs
		 * collapsing
		 */
		_isLong: function(message) {
			return message.length > 250 || (message.match(/\n/g) || []).length > 1;
		}
	});

	OCA.Comments.CommentsTabView = CommentsTabView;
})(OC, OCA);


/*
 * Copyright (c) 2018
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global Handlebars */
(function() {

	/**
	 * Construct a new CommentsModifyMenuinstance
	 * @constructs CommentsModifyMenu
	 * @memberof OC.Comments
	 * @private
	 */
	var CommentsModifyMenu = OC.Backbone.View.extend({
		tagName: 'div',
		className: 'commentsModifyMenu popovermenu bubble menu',
		_scopes: [
			{
				name: 'edit',
				displayName:  t('comments', 'Edit comment'),
				iconClass: 'icon-rename'
			},
			{
				name: 'delete',
				displayName: t('comments', 'Delete comment'),
				iconClass: 'icon-delete'
			}
		],
		initialize: function() {

		},
		events: {
			'click a.action': '_onClickAction'
		},

		/**
		 * Event handler whenever an action has been clicked within the menu
		 *
		 * @param {Object} event event object
		 */
		_onClickAction: function(event) {
			var $target = $(event.currentTarget);
			if (!$target.hasClass('menuitem')) {
				$target = $target.closest('.menuitem');
			}

			OC.hideMenus();

			this.trigger('select:menu-item-clicked', event, $target.data('action'));
		},

		/**
		 * Renders the menu with the currently set items
		 */
		render: function() {
			this.$el.html(OCA.Comments.Templates['commentsmodifymenu']({
				items: this._scopes
			}));
		},

		/**
		 * Displays the menu
		 */
		show: function(context) {
			this._context = context;

			for(var i in this._scopes) {
				this._scopes[i].active = false;
			}


			var $el = $(context.target);
			var offsetIcon = $el.offset();
			var offsetContainer = $el.closest('.authorRow').offset();

			// adding some extra top offset to push the menu below the button.
			var position = {
				top: offsetIcon.top - offsetContainer.top + 48,
				left: '',
				right: ''
			};

			position.left = offsetIcon.left - offsetContainer.left;

			if (position.left > 200) {
				// we need to position the menu to the right.
				position.left = '';
				position.right = this.$el.closest('.comment').find('.date').width();
				this.$el.removeClass('menu-left').addClass('menu-right');
			} else {
				this.$el.removeClass('menu-right').addClass('menu-left');
			}
			this.$el.css(position);
			this.render();
			this.$el.removeClass('hidden');

			OC.showMenu(null, this.$el);
		}
	});

	OCA.Comments = OCA.Comments || {};
	OCA.Comments.CommentsModifyMenu = CommentsModifyMenu;
})(OC, OCA);


/*
 * Copyright (c) 2016 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global Handlebars */

(function() {

	_.extend(OC.Files.Client, {
		PROPERTY_COMMENTS_UNREAD:	'{' + OC.Files.Client.NS_OWNCLOUD + '}comments-unread'
	});

	OCA.Comments = _.extend({}, OCA.Comments);
	if (!OCA.Comments) {
		/**
		 * @namespace
		 */
		OCA.Comments = {};
	}

	/**
	 * @namespace
	 */
	OCA.Comments.FilesPlugin = {
		ignoreLists: [
			'files_trashbin',
			'files.public'
		],

		_formatCommentCount: function(count) {
			return OCA.Comments.Templates['filesplugin']({
				count: count,
				countMessage: n('comments', '%n unread comment', '%n unread comments', count),
				iconUrl: OC.imagePath('core', 'actions/comment')
			});
		},

		attach: function(fileList) {
			var self = this;
			if (this.ignoreLists.indexOf(fileList.id) >= 0) {
				return;
			}

			fileList.registerTabView(new OCA.Comments.CommentsTabView('commentsTabView'));

			var oldGetWebdavProperties = fileList._getWebdavProperties;
			fileList._getWebdavProperties = function() {
				var props = oldGetWebdavProperties.apply(this, arguments);
				props.push(OC.Files.Client.PROPERTY_COMMENTS_UNREAD);
				return props;
			};

			fileList.filesClient.addFileInfoParser(function(response) {
				var data = {};
				var props = response.propStat[0].properties;
				var commentsUnread = props[OC.Files.Client.PROPERTY_COMMENTS_UNREAD];
				if (!_.isUndefined(commentsUnread) && commentsUnread !== '') {
					data.commentsUnread = parseInt(commentsUnread, 10);
				}
				return data;
			});

			fileList.$el.addClass('has-comments');
			var oldCreateRow = fileList._createRow;
			fileList._createRow = function(fileData) {
				var $tr = oldCreateRow.apply(this, arguments);
				if (fileData.commentsUnread) {
					$tr.attr('data-comments-unread', fileData.commentsUnread);
				}
				return $tr;
			};

			// register "comment" action for reading comments
			fileList.fileActions.registerAction({
				name: 'Comment',
				displayName: t('comments', 'Comment'),
				mime: 'all',
				permissions: OC.PERMISSION_READ,
				type: OCA.Files.FileActions.TYPE_INLINE,
				render: function(actionSpec, isDefault, context) {
					var $file = context.$file;
					var unreadComments = $file.data('comments-unread');
					if (unreadComments) {
						var $actionLink = $(self._formatCommentCount(unreadComments));
						context.$file.find('a.name>span.fileactions').append($actionLink);
						return $actionLink;
					}
					return '';
				},
				actionHandler: function(fileName, context) {
					context.$file.find('.action-comment').tooltip('hide');
					// open sidebar in comments section
					context.fileList.showDetailsView(fileName, 'commentsTabView');
				}
			});

			// add attribute to "elementToFile"
			var oldElementToFile = fileList.elementToFile;
			fileList.elementToFile = function($el) {
				var fileInfo = oldElementToFile.apply(this, arguments);
				var commentsUnread = $el.data('comments-unread');
				if (commentsUnread) {
					fileInfo.commentsUnread = commentsUnread;
				}
				return fileInfo;
			};
		}
	};

})();

OC.Plugins.register('OCA.Files.FileList', OCA.Comments.FilesPlugin);


/*
 * @author Joas Schilling <coding@schilljs.com>
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 */

(function() {
	OCA.Comments.ActivityTabViewPlugin = {

		/**
		 * Prepare activity for display
		 *
		 * @param {OCA.Activity.ActivityModel} model for this activity
		 * @param {jQuery} $el jQuery handle for this activity
		 * @param {string} view The view that displayes this activity
		 */
		prepareModelForDisplay: function (model, $el, view) {
			if (model.get('app') !== 'comments' || model.get('type') !== 'comments') {
				return;
			}

			if (view === 'ActivityTabView') {
				$el.addClass('comment');
				if (model.get('message') && this._isLong(model.get('message'))) {
					$el.addClass('collapsed');
					var $overlay = $('<div>').addClass('message-overlay');
					$el.find('.activitymessage').after($overlay);
					$el.on('click', this._onClickCollapsedComment);
				}
			}
		},

		/*
		 * Copy of CommentsTabView._onClickComment()
		 */
		_onClickCollapsedComment: function(ev) {
			var $row = $(ev.target);
			if (!$row.is('.comment')) {
				$row = $row.closest('.comment');
			}
			$row.removeClass('collapsed');
		},

		/*
		 * Copy of CommentsTabView._isLong()
		 */
		_isLong: function(message) {
			return message.length > 250 || (message.match(/\n/g) || []).length > 1;
		}
	};


})();

OC.Plugins.register('OCA.Activity.RenderingPlugins', OCA.Comments.ActivityTabViewPlugin);


/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */
(function(OC, OCA, $) {
	"use strict";

	/**
	 * Construct a new FileActions instance
	 * @constructs Files
	 */
	var Comment = function() {
		this.initialize();
	};

	Comment.prototype = {

		fileList: null,

		/**
		 * Initialize the file search
		 */
		initialize: function() {

			var self = this;

			this.fileAppLoaded = function() {
				return !!OCA.Files && !!OCA.Files.App;
			};
			function inFileList($row, result) {
				return false;

				if (! self.fileAppLoaded()) {
					return false;
				}
				var dir = self.fileList.getCurrentDirectory().replace(/\/+$/,'');
				var resultDir = OC.dirname(result.path);
				return dir === resultDir && self.fileList.inList(result.name);
			}
			function hideNoFilterResults() {
				var $nofilterresults = $('.nofilterresults');
				if ( ! $nofilterresults.hasClass('hidden') ) {
					$nofilterresults.addClass('hidden');
				}
			}

			/**
			 *
			 * @param {jQuery} $row
			 * @param {Object} result
			 * @param {int} result.id
			 * @param {string} result.comment
			 * @param {string} result.authorId
			 * @param {string} result.authorName
			 * @param {string} result.link
			 * @param {string} result.fileName
			 * @param {string} result.path
			 * @returns {*}
			 */
			this.renderCommentResult = function($row, result) {
				if (inFileList($row, result)) {
					return null;
				}
				hideNoFilterResults();
				/*render preview icon, show path beneath filename,
				 show size and last modified date on the right */
				this.updateLegacyMimetype(result);

				var $pathDiv = $('<div>').addClass('path').text(result.path);

				var $avatar = $('<div>');
				$avatar.addClass('avatar')
					.css('display', 'inline-block')
					.css('vertical-align', 'middle')
					.css('margin', '0 5px 2px 3px');

				if (result.authorName) {
					$avatar.avatar(result.authorId, 21, undefined, false, undefined, result.authorName);
				} else {
					$avatar.avatar(result.authorId, 21);
				}

				$row.find('td.info div.name').after($pathDiv).text(result.comment).prepend($('<span>').addClass('path').css('margin-right', '5px').text(result.authorName)).prepend($avatar);
				$row.find('td.result a').attr('href', result.link);

				$row.find('td.icon')
					.css('background-image', 'url(' + OC.imagePath('core', 'actions/comment') + ')')
					.css('opacity', '.4');
				var dir = OC.dirname(result.path);
				if (dir === '') {
					dir = '/';
				}
				$row.find('td.info a').attr('href',
					OC.generateUrl('/apps/files/?dir={dir}&scrollto={scrollto}', {dir: dir, scrollto: result.fileName})
				);

				return $row;
			};

			this.handleCommentClick = function($row, result, event) {
				if (self.fileAppLoaded() && self.fileList.id === 'files') {
					self.fileList.changeDirectory(OC.dirname(result.path));
					self.fileList.scrollTo(result.name);
					return false;
				} else {
					return true;
				}
			};

			this.updateLegacyMimetype = function (result) {
				// backward compatibility:
				if (!result.mime && result.mime_type) {
					result.mime = result.mime_type;
				}
			};
			this.setFileList = function (fileList) {
				this.fileList = fileList;
			};

			OC.Plugins.register('OCA.Search.Core', this);
		},
		attach: function(search) {
			search.setRenderer('comment', this.renderCommentResult.bind(this));
			search.setHandler('comment', this.handleCommentClick.bind(this));
		}
	};

	OCA.Search.comment = new Comment();
})(OC, OCA, $);


/*! jquery.caret 2015-02-01 */
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(c){return a.returnExportsGlobal=b(c)}):"object"==typeof exports?module.exports=b(require("jquery")):b(jQuery)}(this,function(a){"use strict";var b,c,d,e,f,g,h,i,j,k,l;k="caret",b=function(){function b(a){this.$inputor=a,this.domInputor=this.$inputor[0]}return b.prototype.setPos=function(){return this.domInputor},b.prototype.getIEPosition=function(){return this.getPosition()},b.prototype.getPosition=function(){var a,b;return b=this.getOffset(),a=this.$inputor.offset(),b.left-=a.left,b.top-=a.top,b},b.prototype.getOldIEPos=function(){var a,b;return b=h.selection.createRange(),a=h.body.createTextRange(),a.moveToElementText(this.domInputor),a.setEndPoint("EndToEnd",b),a.text.length},b.prototype.getPos=function(){var a,b,c;return(c=this.range())?(a=c.cloneRange(),a.selectNodeContents(this.domInputor),a.setEnd(c.endContainer,c.endOffset),b=a.toString().length,a.detach(),b):h.selection?this.getOldIEPos():void 0},b.prototype.getOldIEOffset=function(){var a,b;return a=h.selection.createRange().duplicate(),a.moveStart("character",-1),b=a.getBoundingClientRect(),{height:b.bottom-b.top,left:b.left,top:b.top}},b.prototype.getOffset=function(){var b,c,d,e,f;return j.getSelection&&(d=this.range())?(d.endOffset-1>0&&d.endContainer===!this.domInputor&&(b=d.cloneRange(),b.setStart(d.endContainer,d.endOffset-1),b.setEnd(d.endContainer,d.endOffset),e=b.getBoundingClientRect(),c={height:e.height,left:e.left+e.width,top:e.top},b.detach()),c&&0!==(null!=c?c.height:void 0)||(b=d.cloneRange(),f=a(h.createTextNode("|")),b.insertNode(f[0]),b.selectNode(f[0]),e=b.getBoundingClientRect(),c={height:e.height,left:e.left,top:e.top},f.remove(),b.detach())):h.selection&&(c=this.getOldIEOffset()),c&&(c.top+=a(j).scrollTop(),c.left+=a(j).scrollLeft()),c},b.prototype.range=function(){var a;if(j.getSelection)return a=j.getSelection(),a.rangeCount>0?a.getRangeAt(0):null},b}(),c=function(){function b(a){this.$inputor=a,this.domInputor=this.$inputor[0]}return b.prototype.getIEPos=function(){var a,b,c,d,e,f,g;return b=this.domInputor,f=h.selection.createRange(),e=0,f&&f.parentElement()===b&&(d=b.value.replace(/\r\n/g,"\n"),c=d.length,g=b.createTextRange(),g.moveToBookmark(f.getBookmark()),a=b.createTextRange(),a.collapse(!1),e=g.compareEndPoints("StartToEnd",a)>-1?c:-g.moveStart("character",-c)),e},b.prototype.getPos=function(){return h.selection?this.getIEPos():this.domInputor.selectionStart},b.prototype.setPos=function(a){var b,c;return b=this.domInputor,h.selection?(c=b.createTextRange(),c.move("character",a),c.select()):b.setSelectionRange&&b.setSelectionRange(a,a),b},b.prototype.getIEOffset=function(a){var b,c,d,e;return c=this.domInputor.createTextRange(),a||(a=this.getPos()),c.move("character",a),d=c.boundingLeft,e=c.boundingTop,b=c.boundingHeight,{left:d,top:e,height:b}},b.prototype.getOffset=function(b){var c,d,e;return c=this.$inputor,h.selection?(d=this.getIEOffset(b),d.top+=a(j).scrollTop()+c.scrollTop(),d.left+=a(j).scrollLeft()+c.scrollLeft(),d):(d=c.offset(),e=this.getPosition(b),d={left:d.left+e.left-c.scrollLeft(),top:d.top+e.top-c.scrollTop(),height:e.height})},b.prototype.getPosition=function(a){var b,c,e,f,g,h,i;return b=this.$inputor,f=function(a){return a=a.replace(/<|>|`|"|&/g,"?").replace(/\r\n|\r|\n/g,"<br/>"),/firefox/i.test(navigator.userAgent)&&(a=a.replace(/\s/g,"&nbsp;")),a},void 0===a&&(a=this.getPos()),i=b.val().slice(0,a),e=b.val().slice(a),g="<span style='position: relative; display: inline;'>"+f(i)+"</span>",g+="<span id='caret' style='position: relative; display: inline;'>|</span>",g+="<span style='position: relative; display: inline;'>"+f(e)+"</span>",h=new d(b),c=h.create(g).rect()},b.prototype.getIEPosition=function(a){var b,c,d,e,f;return d=this.getIEOffset(a),c=this.$inputor.offset(),e=d.left-c.left,f=d.top-c.top,b=d.height,{left:e,top:f,height:b}},b}(),d=function(){function b(a){this.$inputor=a}return b.prototype.css_attr=["borderBottomWidth","borderLeftWidth","borderRightWidth","borderTopStyle","borderRightStyle","borderBottomStyle","borderLeftStyle","borderTopWidth","boxSizing","fontFamily","fontSize","fontWeight","height","letterSpacing","lineHeight","marginBottom","marginLeft","marginRight","marginTop","outlineWidth","overflow","overflowX","overflowY","paddingBottom","paddingLeft","paddingRight","paddingTop","textAlign","textOverflow","textTransform","whiteSpace","wordBreak","wordWrap"],b.prototype.mirrorCss=function(){var b,c=this;return b={position:"absolute",left:-9999,top:0,zIndex:-2e4},"TEXTAREA"===this.$inputor.prop("tagName")&&this.css_attr.push("width"),a.each(this.css_attr,function(a,d){return b[d]=c.$inputor.css(d)}),b},b.prototype.create=function(b){return this.$mirror=a("<div></div>"),this.$mirror.css(this.mirrorCss()),this.$mirror.html(b),this.$inputor.after(this.$mirror),this},b.prototype.rect=function(){var a,b,c;return a=this.$mirror.find("#caret"),b=a.position(),c={left:b.left,top:b.top,height:a.height()},this.$mirror.remove(),c},b}(),e={contentEditable:function(a){return!(!a[0].contentEditable||"true"!==a[0].contentEditable)}},g={pos:function(a){return a||0===a?this.setPos(a):this.getPos()},position:function(a){return h.selection?this.getIEPosition(a):this.getPosition(a)},offset:function(a){var b;return b=this.getOffset(a)}},h=null,j=null,i=null,l=function(a){var b;return(b=null!=a?a.iframe:void 0)?(i=b,j=b.contentWindow,h=b.contentDocument||j.document):(i=void 0,j=window,h=document)},f=function(a){var b;h=a[0].ownerDocument,j=h.defaultView||h.parentWindow;try{return i=j.frameElement}catch(c){b=c}},a.fn.caret=function(d,f,h){var i;return g[d]?(a.isPlainObject(f)?(l(f),f=void 0):l(h),i=e.contentEditable(this)?new b(this):new c(this),g[d].apply(i,[f])):a.error("Method "+d+" does not exist on jQuery.caret")},a.fn.caret.EditableCaret=b,a.fn.caret.InputCaret=c,a.fn.caret.Utils=e,a.fn.caret.apis=g});

!function(t,e){"function"==typeof define&&define.amd?define(["jquery"],function(t){return e(t)}):"object"==typeof exports?module.exports=e(require("jquery")):e(jQuery)}(this,function(t){var e,i;i={ESC:27,TAB:9,ENTER:13,CTRL:17,A:65,P:80,N:78,LEFT:37,UP:38,RIGHT:39,DOWN:40,BACKSPACE:8,SPACE:32},e={beforeSave:function(t){return r.arrayToDefaultHash(t)},matcher:function(t,e,i,n){var r,o,s,a,h;return t=t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&"),i&&(t="(?:^|\\s)"+t),r=decodeURI("%C3%80"),o=decodeURI("%C3%BF"),h=n?" ":"",a=new RegExp(t+"([A-Za-z"+r+"-"+o+"0-9_"+h+"'.+-]*)$|"+t+"([^\\x00-\\xff]*)$","gi"),s=a.exec(e),s?s[2]||s[1]:null},filter:function(t,e,i){var n,r,o,s;for(n=[],r=0,s=e.length;s>r;r++)o=e[r],~new String(o[i]).toLowerCase().indexOf(t.toLowerCase())&&n.push(o);return n},remoteFilter:null,sorter:function(t,e,i){var n,r,o,s;if(!t)return e;for(n=[],r=0,s=e.length;s>r;r++)o=e[r],o.atwho_order=new String(o[i]).toLowerCase().indexOf(t.toLowerCase()),o.atwho_order>-1&&n.push(o);return n.sort(function(t,e){return t.atwho_order-e.atwho_order})},tplEval:function(t,e){var i,n,r;r=t;try{return"string"!=typeof t&&(r=t(e)),r.replace(/\$\{([^\}]*)\}/g,function(t,i,n){return e[i]})}catch(n){return i=n,""}},highlighter:function(t,e){var i;return e?(i=new RegExp(">\\s*([^<]*?)("+e.replace("+","\\+")+")([^<]*)\\s*<","ig"),t.replace(i,function(t,e,i,n){return"> "+e+"<strong>"+i+"</strong>"+n+" <"})):t},beforeInsert:function(t,e,i){return t},beforeReposition:function(t){return t},afterMatchFailed:function(t,e){}};var n;n=function(){function e(e){this.currentFlag=null,this.controllers={},this.aliasMaps={},this.$inputor=t(e),this.setupRootElement(),this.listen()}return e.prototype.createContainer=function(e){var i;return null!=(i=this.$el)&&i.remove(),t(e.body).append(this.$el=t("<div class='atwho-container'></div>"))},e.prototype.setupRootElement=function(e,i){var n,r;if(null==i&&(i=!1),e)this.window=e.contentWindow,this.document=e.contentDocument||this.window.document,this.iframe=e;else{this.document=this.$inputor[0].ownerDocument,this.window=this.document.defaultView||this.document.parentWindow;try{this.iframe=this.window.frameElement}catch(r){if(n=r,this.iframe=null,t.fn.atwho.debug)throw new Error("iframe auto-discovery is failed.\nPlease use `setIframe` to set the target iframe manually.\n"+n)}}return this.createContainer((this.iframeAsRoot=i)?this.document:document)},e.prototype.controller=function(t){var e,i,n,r;if(this.aliasMaps[t])i=this.controllers[this.aliasMaps[t]];else{r=this.controllers;for(n in r)if(e=r[n],n===t){i=e;break}}return i?i:this.controllers[this.currentFlag]},e.prototype.setContextFor=function(t){return this.currentFlag=t,this},e.prototype.reg=function(t,e){var i,n;return n=(i=this.controllers)[t]||(i[t]=this.$inputor.is("[contentEditable]")?new l(this,t):new s(this,t)),e.alias&&(this.aliasMaps[e.alias]=t),n.init(e),this},e.prototype.listen=function(){return this.$inputor.on("compositionstart",function(t){return function(e){var i;return null!=(i=t.controller())&&i.view.hide(),t.isComposing=!0,null}}(this)).on("compositionend",function(t){return function(e){return t.isComposing=!1,setTimeout(function(e){return t.dispatch(e)}),null}}(this)).on("keyup.atwhoInner",function(t){return function(e){return t.onKeyup(e)}}(this)).on("keydown.atwhoInner",function(t){return function(e){return t.onKeydown(e)}}(this)).on("blur.atwhoInner",function(t){return function(e){var i;return(i=t.controller())?(i.expectedQueryCBId=null,i.view.hide(e,i.getOpt("displayTimeout"))):void 0}}(this)).on("click.atwhoInner",function(t){return function(e){return t.dispatch(e)}}(this)).on("scroll.atwhoInner",function(t){return function(){var e;return e=t.$inputor.scrollTop(),function(i){var n,r;return n=i.target.scrollTop,e!==n&&null!=(r=t.controller())&&r.view.hide(i),e=n,!0}}}(this)())},e.prototype.shutdown=function(){var t,e,i;i=this.controllers;for(t in i)e=i[t],e.destroy(),delete this.controllers[t];return this.$inputor.off(".atwhoInner"),this.$el.remove()},e.prototype.dispatch=function(t){var e,i,n,r;n=this.controllers,r=[];for(e in n)i=n[e],r.push(i.lookUp(t));return r},e.prototype.onKeyup=function(e){var n;switch(e.keyCode){case i.ESC:e.preventDefault(),null!=(n=this.controller())&&n.view.hide();break;case i.DOWN:case i.UP:case i.CTRL:case i.ENTER:t.noop();break;case i.P:case i.N:e.ctrlKey||this.dispatch(e);break;default:this.dispatch(e)}},e.prototype.onKeydown=function(e){var n,r;if(r=null!=(n=this.controller())?n.view:void 0,r&&r.visible())switch(e.keyCode){case i.ESC:e.preventDefault(),r.hide(e);break;case i.UP:e.preventDefault(),r.prev();break;case i.DOWN:e.preventDefault(),r.next();break;case i.P:if(!e.ctrlKey)return;e.preventDefault(),r.prev();break;case i.N:if(!e.ctrlKey)return;e.preventDefault(),r.next();break;case i.TAB:case i.ENTER:case i.SPACE:if(!r.visible())return;if(!this.controller().getOpt("spaceSelectsMatch")&&e.keyCode===i.SPACE)return;if(!this.controller().getOpt("tabSelectsMatch")&&e.keyCode===i.TAB)return;r.highlighted()?(e.preventDefault(),r.choose(e)):r.hide(e);break;default:t.noop()}},e}();var r,o=[].slice;r=function(){function i(e,i){this.app=e,this.at=i,this.$inputor=this.app.$inputor,this.id=this.$inputor[0].id||this.uid(),this.expectedQueryCBId=null,this.setting=null,this.query=null,this.pos=0,this.range=null,0===(this.$el=t("#atwho-ground-"+this.id,this.app.$el)).length&&this.app.$el.append(this.$el=t("<div id='atwho-ground-"+this.id+"'></div>")),this.model=new u(this),this.view=new c(this)}return i.prototype.uid=function(){return(Math.random().toString(16)+"000000000").substr(2,8)+(new Date).getTime()},i.prototype.init=function(e){return this.setting=t.extend({},this.setting||t.fn.atwho["default"],e),this.view.init(),this.model.reload(this.setting.data)},i.prototype.destroy=function(){return this.trigger("beforeDestroy"),this.model.destroy(),this.view.destroy(),this.$el.remove()},i.prototype.callDefault=function(){var i,n,r,s;s=arguments[0],i=2<=arguments.length?o.call(arguments,1):[];try{return e[s].apply(this,i)}catch(r){return n=r,t.error(n+" Or maybe At.js doesn't have function "+s)}},i.prototype.trigger=function(t,e){var i,n;return null==e&&(e=[]),e.push(this),i=this.getOpt("alias"),n=i?t+"-"+i+".atwho":t+".atwho",this.$inputor.trigger(n,e)},i.prototype.callbacks=function(t){return this.getOpt("callbacks")[t]||e[t]},i.prototype.getOpt=function(t,e){var i,n;try{return this.setting[t]}catch(n){return i=n,null}},i.prototype.insertContentFor=function(e){var i,n;return n=this.getOpt("insertTpl"),i=t.extend({},e.data("item-data"),{"atwho-at":this.at}),this.callbacks("tplEval").call(this,n,i,"onInsert")},i.prototype.renderView=function(t){var e;return e=this.getOpt("searchKey"),t=this.callbacks("sorter").call(this,this.query.text,t.slice(0,1001),e),this.view.render(t.slice(0,this.getOpt("limit")))},i.arrayToDefaultHash=function(e){var i,n,r,o;if(!t.isArray(e))return e;for(o=[],i=0,r=e.length;r>i;i++)n=e[i],t.isPlainObject(n)?o.push(n):o.push({name:n});return o},i.prototype.lookUp=function(t){var e,i;if((!t||"click"!==t.type||this.getOpt("lookUpOnClick"))&&(!this.getOpt("suspendOnComposing")||!this.app.isComposing))return(e=this.catchQuery(t))?(this.app.setContextFor(this.at),(i=this.getOpt("delay"))?this._delayLookUp(e,i):this._lookUp(e),e):(this.expectedQueryCBId=null,e)},i.prototype._delayLookUp=function(t,e){var i,n;return i=Date.now?Date.now():(new Date).getTime(),this.previousCallTime||(this.previousCallTime=i),n=e-(i-this.previousCallTime),n>0&&e>n?(this.previousCallTime=i,this._stopDelayedCall(),this.delayedCallTimeout=setTimeout(function(e){return function(){return e.previousCallTime=0,e.delayedCallTimeout=null,e._lookUp(t)}}(this),e)):(this._stopDelayedCall(),this.previousCallTime!==i&&(this.previousCallTime=0),this._lookUp(t))},i.prototype._stopDelayedCall=function(){return this.delayedCallTimeout?(clearTimeout(this.delayedCallTimeout),this.delayedCallTimeout=null):void 0},i.prototype._generateQueryCBId=function(){return{}},i.prototype._lookUp=function(e){var i;return i=function(t,e){return t===this.expectedQueryCBId?e&&e.length>0?this.renderView(this.constructor.arrayToDefaultHash(e)):this.view.hide():void 0},this.expectedQueryCBId=this._generateQueryCBId(),this.model.query(e.text,t.proxy(i,this,this.expectedQueryCBId))},i}();var s,a=function(t,e){function i(){this.constructor=t}for(var n in e)h.call(e,n)&&(t[n]=e[n]);return i.prototype=e.prototype,t.prototype=new i,t.__super__=e.prototype,t},h={}.hasOwnProperty;s=function(e){function i(){return i.__super__.constructor.apply(this,arguments)}return a(i,e),i.prototype.catchQuery=function(){var t,e,i,n,r,o,s;return e=this.$inputor.val(),t=this.$inputor.caret("pos",{iframe:this.app.iframe}),s=e.slice(0,t),r=this.callbacks("matcher").call(this,this.at,s,this.getOpt("startWithSpace"),this.getOpt("acceptSpaceBar")),n="string"==typeof r,n&&r.length<this.getOpt("minLen",0)?void 0:(n&&r.length<=this.getOpt("maxLen",20)?(o=t-r.length,i=o+r.length,this.pos=o,r={text:r,headPos:o,endPos:i},this.trigger("matched",[this.at,r.text])):(r=null,this.view.hide()),this.query=r)},i.prototype.rect=function(){var e,i,n;if(e=this.$inputor.caret("offset",this.pos-1,{iframe:this.app.iframe}))return this.app.iframe&&!this.app.iframeAsRoot&&(i=t(this.app.iframe).offset(),e.left+=i.left,e.top+=i.top),n=this.app.document.selection?0:2,{left:e.left,top:e.top,bottom:e.top+e.height+n}},i.prototype.insert=function(t,e){var i,n,r,o,s;return i=this.$inputor,n=i.val(),r=n.slice(0,Math.max(this.query.headPos-this.at.length,0)),o=""===(o=this.getOpt("suffix"))?o:o||" ",t+=o,s=""+r+t+n.slice(this.query.endPos||0),i.val(s),i.caret("pos",r.length+t.length,{iframe:this.app.iframe}),i.is(":focus")||i.focus(),i.change()},i}(r);var l,a=function(t,e){function i(){this.constructor=t}for(var n in e)h.call(e,n)&&(t[n]=e[n]);return i.prototype=e.prototype,t.prototype=new i,t.__super__=e.prototype,t},h={}.hasOwnProperty;l=function(e){function n(){return n.__super__.constructor.apply(this,arguments)}return a(n,e),n.prototype._getRange=function(){var t;return t=this.app.window.getSelection(),t.rangeCount>0?t.getRangeAt(0):void 0},n.prototype._setRange=function(e,i,n){return null==n&&(n=this._getRange()),n&&i?(i=t(i)[0],"after"===e?(n.setEndAfter(i),n.setStartAfter(i)):(n.setEndBefore(i),n.setStartBefore(i)),n.collapse(!1),this._clearRange(n)):void 0},n.prototype._clearRange=function(t){var e;return null==t&&(t=this._getRange()),e=this.app.window.getSelection(),null==this.ctrl_a_pressed?(e.removeAllRanges(),e.addRange(t)):void 0},n.prototype._movingEvent=function(t){var e;return"click"===t.type||(e=t.which)===i.RIGHT||e===i.LEFT||e===i.UP||e===i.DOWN},n.prototype._unwrap=function(e){var i;return e=t(e).unwrap().get(0),(i=e.nextSibling)&&i.nodeValue&&(e.nodeValue+=i.nodeValue,t(i).remove()),e},n.prototype.catchQuery=function(e){var n,r,o,s,a,h,l,u,c,p,f,d;if((d=this._getRange())&&d.collapsed){if(e.which===i.ENTER)return(r=t(d.startContainer).closest(".atwho-query")).contents().unwrap(),r.is(":empty")&&r.remove(),(r=t(".atwho-query",this.app.document)).text(r.text()).contents().last().unwrap(),void this._clearRange();if(/firefox/i.test(navigator.userAgent)){if(t(d.startContainer).is(this.$inputor))return void this._clearRange();e.which===i.BACKSPACE&&d.startContainer.nodeType===document.ELEMENT_NODE&&(c=d.startOffset-1)>=0?(o=d.cloneRange(),o.setStart(d.startContainer,c),t(o.cloneContents()).contents().last().is(".atwho-inserted")&&(a=t(d.startContainer).contents().get(c),this._setRange("after",t(a).contents().last()))):e.which===i.LEFT&&d.startContainer.nodeType===document.TEXT_NODE&&(n=t(d.startContainer.previousSibling),n.is(".atwho-inserted")&&0===d.startOffset&&this._setRange("after",n.contents().last()))}if(t(d.startContainer).closest(".atwho-inserted").addClass("atwho-query").siblings().removeClass("atwho-query"),(r=t(".atwho-query",this.app.document)).length>0&&r.is(":empty")&&0===r.text().length&&r.remove(),this._movingEvent(e)||r.removeClass("atwho-inserted"),r.length>0)switch(e.which){case i.LEFT:return this._setRange("before",r.get(0),d),void r.removeClass("atwho-query");case i.RIGHT:return this._setRange("after",r.get(0).nextSibling,d),void r.removeClass("atwho-query")}if(r.length>0&&(f=r.attr("data-atwho-at-query"))&&(r.empty().html(f).attr("data-atwho-at-query",null),this._setRange("after",r.get(0),d)),o=d.cloneRange(),o.setStart(d.startContainer,0),u=this.callbacks("matcher").call(this,this.at,o.toString(),this.getOpt("startWithSpace"),this.getOpt("acceptSpaceBar")),h="string"==typeof u,0===r.length&&h&&(s=d.startOffset-this.at.length-u.length)>=0&&(d.setStart(d.startContainer,s),r=t("<span/>",this.app.document).attr(this.getOpt("editableAtwhoQueryAttrs")).addClass("atwho-query"),d.surroundContents(r.get(0)),l=r.contents().last().get(0),l&&(/firefox/i.test(navigator.userAgent)?(d.setStart(l,l.length),d.setEnd(l,l.length),this._clearRange(d)):this._setRange("after",l,d))),!(h&&u.length<this.getOpt("minLen",0)))return h&&u.length<=this.getOpt("maxLen",20)?(p={text:u,el:r},this.trigger("matched",[this.at,p.text]),this.query=p):(this.view.hide(),this.query={el:r},r.text().indexOf(this.at)>=0&&(this._movingEvent(e)&&r.hasClass("atwho-inserted")?r.removeClass("atwho-query"):!1!==this.callbacks("afterMatchFailed").call(this,this.at,r)&&this._setRange("after",this._unwrap(r.text(r.text()).contents().first()))),null)}},n.prototype.rect=function(){var e,i,n;return n=this.query.el.offset(),n&&this.query.el[0].getClientRects().length?(this.app.iframe&&!this.app.iframeAsRoot&&(i=(e=t(this.app.iframe)).offset(),n.left+=i.left-this.$inputor.scrollLeft(),n.top+=i.top-this.$inputor.scrollTop()),n.bottom=n.top+this.query.el.height(),n):void 0},n.prototype.insert=function(t,e){var i,n,r,o,s;return this.$inputor.is(":focus")||this.$inputor.focus(),n=this.getOpt("functionOverrides"),n.insert?n.insert.call(this,t,e):(o=""===(o=this.getOpt("suffix"))?o:o||" ",i=e.data("item-data"),this.query.el.removeClass("atwho-query").addClass("atwho-inserted").html(t).attr("data-atwho-at-query",""+i["atwho-at"]+this.query.text).attr("contenteditable","false"),(r=this._getRange())&&(this.query.el.length&&r.setEndAfter(this.query.el[0]),r.collapse(!1),r.insertNode(s=this.app.document.createTextNode(""+o)),this._setRange("after",s,r)),this.$inputor.is(":focus")||this.$inputor.focus(),this.$inputor.change())},n}(r);var u;u=function(){function e(t){this.context=t,this.at=this.context.at,this.storage=this.context.$inputor}return e.prototype.destroy=function(){return this.storage.data(this.at,null)},e.prototype.saved=function(){return this.fetch()>0},e.prototype.query=function(t,e){var i,n,r;return n=this.fetch(),r=this.context.getOpt("searchKey"),n=this.context.callbacks("filter").call(this.context,t,n,r)||[],i=this.context.callbacks("remoteFilter"),n.length>0||!i&&0===n.length?e(n):i.call(this.context,t,e)},e.prototype.fetch=function(){return this.storage.data(this.at)||[]},e.prototype.save=function(t){return this.storage.data(this.at,this.context.callbacks("beforeSave").call(this.context,t||[]))},e.prototype.load=function(t){return!this.saved()&&t?this._load(t):void 0},e.prototype.reload=function(t){return this._load(t)},e.prototype._load=function(e){return"string"==typeof e?t.ajax(e,{dataType:"json"}).done(function(t){return function(e){return t.save(e)}}(this)):this.save(e)},e}();var c;c=function(){function e(e){this.context=e,this.$el=t("<div class='atwho-view'><ul class='atwho-view-ul'></ul></div>"),this.$elUl=this.$el.children(),this.timeoutID=null,this.context.$el.append(this.$el),this.bindEvent()}return e.prototype.init=function(){var t,e;return e=this.context.getOpt("alias")||this.context.at.charCodeAt(0),t=this.context.getOpt("headerTpl"),t&&1===this.$el.children().length&&this.$el.prepend(t),this.$el.attr({id:"at-view-"+e})},e.prototype.destroy=function(){return this.$el.remove()},e.prototype.bindEvent=function(){var e,i,n;return e=this.$el.find("ul"),i=0,n=0,e.on("mousemove.atwho-view","li",function(r){return function(r){var o;if((i!==r.clientX||n!==r.clientY)&&(i=r.clientX,n=r.clientY,o=t(r.currentTarget),!o.hasClass("cur")))return e.find(".cur").removeClass("cur"),o.addClass("cur")}}(this)).on("click.atwho-view","li",function(i){return function(n){return e.find(".cur").removeClass("cur"),t(n.currentTarget).addClass("cur"),i.choose(n),n.preventDefault()}}(this))},e.prototype.visible=function(){return t.expr.filters.visible(this.$el[0])},e.prototype.highlighted=function(){return this.$el.find(".cur").length>0},e.prototype.choose=function(t){var e,i;return(e=this.$el.find(".cur")).length&&(i=this.context.insertContentFor(e),this.context._stopDelayedCall(),this.context.insert(this.context.callbacks("beforeInsert").call(this.context,i,e,t),e),this.context.trigger("inserted",[e,t]),this.hide(t)),this.context.getOpt("hideWithoutSuffix")?this.stopShowing=!0:void 0},e.prototype.reposition=function(e){var i,n,r,o;return i=this.context.app.iframeAsRoot?this.context.app.window:window,e.bottom+this.$el.height()-t(i).scrollTop()>t(i).height()&&(e.bottom=e.top-this.$el.height()),e.left>(r=t(i).width()-this.$el.width()-5)&&(e.left=r),n={left:e.left,top:e.bottom},null!=(o=this.context.callbacks("beforeReposition"))&&o.call(this.context,n),this.$el.offset(n),this.context.trigger("reposition",[n])},e.prototype.next=function(){var t,e,i,n;return t=this.$el.find(".cur").removeClass("cur"),e=t.next(),e.length||(e=this.$el.find("li:first")),e.addClass("cur"),i=e[0],n=i.offsetTop+i.offsetHeight+(i.nextSibling?i.nextSibling.offsetHeight:0),this.scrollTop(Math.max(0,n-this.$el.height()))},e.prototype.prev=function(){var t,e,i,n;return t=this.$el.find(".cur").removeClass("cur"),i=t.prev(),i.length||(i=this.$el.find("li:last")),i.addClass("cur"),n=i[0],e=n.offsetTop+n.offsetHeight+(n.nextSibling?n.nextSibling.offsetHeight:0),this.scrollTop(Math.max(0,e-this.$el.height()))},e.prototype.scrollTop=function(t){var e;return e=this.context.getOpt("scrollDuration"),e?this.$elUl.animate({scrollTop:t},e):this.$elUl.scrollTop(t)},e.prototype.show=function(){var t;return this.stopShowing?void(this.stopShowing=!1):(this.visible()||(this.$el.show(),this.$el.scrollTop(0),this.context.trigger("shown")),(t=this.context.rect())?this.reposition(t):void 0)},e.prototype.hide=function(t,e){var i;if(this.visible())return isNaN(e)?(this.$el.hide(),this.context.trigger("hidden",[t])):(i=function(t){return function(){return t.hide()}}(this),clearTimeout(this.timeoutID),this.timeoutID=setTimeout(i,e))},e.prototype.render=function(e){var i,n,r,o,s,a,h;if(!(t.isArray(e)&&e.length>0))return void this.hide();for(this.$el.find("ul").empty(),n=this.$el.find("ul"),h=this.context.getOpt("displayTpl"),r=0,s=e.length;s>r;r++)o=e[r],o=t.extend({},o,{"atwho-at":this.context.at}),a=this.context.callbacks("tplEval").call(this.context,h,o,"onDisplay"),i=t(this.context.callbacks("highlighter").call(this.context,a,this.context.query.text)),i.data("item-data",o),n.append(i);return this.show(),this.context.getOpt("highlightFirst")?n.find("li:first").addClass("cur"):void 0},e}();var p;p={load:function(t,e){var i;return(i=this.controller(t))?i.model.load(e):void 0},isSelecting:function(){var t;return!!(null!=(t=this.controller())?t.view.visible():void 0)},hide:function(){var t;return null!=(t=this.controller())?t.view.hide():void 0},reposition:function(){var t;return(t=this.controller())?t.view.reposition(t.rect()):void 0},setIframe:function(t,e){return this.setupRootElement(t,e),null},run:function(){return this.dispatch()},destroy:function(){return this.shutdown(),this.$inputor.data("atwho",null)}},t.fn.atwho=function(e){var i,r;return i=arguments,r=null,this.filter('textarea, input, [contenteditable=""], [contenteditable=true]').each(function(){var o,s;return(s=(o=t(this)).data("atwho"))||o.data("atwho",s=new n(this)),"object"!=typeof e&&e?p[e]&&s?r=p[e].apply(s,Array.prototype.slice.call(i,1)):t.error("Method "+e+" does not exist on jQuery.atwho"):s.reg(e.at,e)}),null!=r?r:this},t.fn.atwho["default"]={at:void 0,alias:void 0,data:null,displayTpl:"<li>${name}</li>",insertTpl:"${atwho-at}${name}",headerTpl:null,callbacks:e,functionOverrides:{},searchKey:"name",suffix:void 0,hideWithoutSuffix:!1,startWithSpace:!0,acceptSpaceBar:!1,highlightFirst:!0,limit:5,maxLen:20,minLen:0,displayTimeout:300,delay:null,spaceSelectsMatch:!1,tabSelectsMatch:!0,editableAtwhoQueryAttrs:{},scrollDuration:150,suspendOnComposing:!0,lookUpOnClick:!0},t.fn.atwho.debug=!1});

