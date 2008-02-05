(function(){
	var jobberBase = window.jobberBase = function () {
		var _registered = {};
		return {
			init: function() {
				if (_registered.init) {
					$.each(_registered.init, function(nr, fn){
						fn.call();
					});
				}
			},
			extend: function(prop) {
				for (var i in prop) {
					if (prop[i] != undefined) {
						this[i] = prop[i];
					}
				}
			},
			register: function(fn, type) {
				if (!_registered[type]) {
					_registered[type] = [];
				}
				_registered[type].push(fn);
			},
			template: function(tpl, callback) {
				return tpl.replace(/\{([\w-]+)(?:\:([\w\.]*)(?:\((.*?)?\))?)?\}/g, callback);
			},
			insertLink: function(path, text) {
				if (typeof tinyMCE != 'object') {
					return;
				}
				var inst = tinyMCE.selectedInstance;
				inst.contentWindow.focus();
				
				var elm = inst.selection.getNode();
				elm = inst.dom.getParent(elm, "A");
				inst.execCommand('mceBeginUndoLevel');
				var sel = inst.selection.getContent();
				if (elm == null) {
					if (sel != '') {
						inst.execCommand('mceInsertLink',text, path);
					} else {
						tinyMCE.execCommand(
							"mceInsertContent",
							false,
							' <a href="' + path + '">' + text + '</a> '
						);
					}
				} else {
					elm.setAttribute('href',path);
					elm.setAttribute('mce_href',path);
				}
				try {
					inst.selection.collapse(false);
				} catch (ex) {
				}
				inst.execCommand("mceEndUndoLevel");
			}
		}
	}();
	$(jobberBase.init);
	
	jobberBase.editor = function() {
		if (typeof tinyMCE != 'undefined') {
			tinyMCE.init({
				mode : "textareas",
				theme : "advanced",
				plugins : "style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras,",
				theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,media,advhr,|,ltr,rtl",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				editor_selector : "mceEditor"
			});
			$('#links_list')
				.bind('click', function(e){
					if ($(e.target).is('a')) {
						e.target.blur();
						jobberBase.insertLink($(e.target).attr('rel'), $(e.target).text());
					}
					return false;
				});
		}
		console.log($('#page_has_form')
			.bind('change', function(){
				console.log(this);
				$(this)
					.parent()
					.parent()
					.parent()
					.nextAll()
					.toggleClass('hidden');
			}));
	};
	$(window).bind('load', jobberBase.editor);
})();