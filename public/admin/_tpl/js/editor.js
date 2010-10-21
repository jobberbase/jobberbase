(function() {
	jobberBase.editor = function() {
		if (typeof tinyMCE != 'undefined') {
			tinyMCE.init({
				mode : "textareas",
				theme : "advanced",
				plugins : "style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras,",
				theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect",
				theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor",
				theme_advanced_buttons3 : "",
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
		$('#page_has_form')
			.bind('change', function(){
				console.log(this);
				$(this)
					.parent()
					.parent()
					.parent()
					.nextAll()
					.toggleClass('hidden');
			});
	};
})();