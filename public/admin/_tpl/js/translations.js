(function() {
	jobberBase.translations = function() {
		
		var addLanguage = function() {
			if ($("#new-lang-name").val() != "" && $("#new-lang-code").val() != "")
			{
				$.ajax({
					type: 'post',
					url: Jobber.jobber_admin_url + 'translations/',
					data: {
						action: 'add_language',
						name: $("#new-lang-name").val(),
						code: $("#new-lang-code").val()
					},
					success: function(response) {
						window.location.reload();
					}
				});	
			}
			else
			{
				alert("Please enter the new language's name and 2-letter code");
			}
		};
		
		var editLanguage = function(lang_code) {
			$("tr." + lang_code + " td span").hide();
			$("tr." + lang_code + " td div.lang-edit").show();
			
			$("tr." + lang_code + " .new-lang-name").focus();
			
			$("tr." + lang_code + " button.lang-save-trigger").click(function() {
				lang_id = $(this).attr("rel");
				name = $("tr." + lang_code + " .new-lang-name").val();
				code = $("tr." + lang_code + " .new-lang-code").val();
				
				if (name != "" && code != "")
				{
					$.ajax({
						type: 'post',
						url: Jobber.jobber_admin_url + 'translations/',
						data: {
							action: 'edit_language',
							id: lang_id,
							name: name,
							code: code
						},
						success: function(response) {
							window.location.reload();
						}
					});	
				}
				else
				{
					alert("Please enter the new language's name and 2-letter code");
				}	
				return false;
			});
		};
		
		var deleteLanguage = function(id) {
			$.ajax({
				type: 'post',
				url: Jobber.jobber_admin_url + 'translations/',
				data: {
					action: 'delete_language',
					id: id
				},
				success: function(response) {
					window.location.reload();
				}
			});	
		};
		
		
		var addTranslationSection = function(lang_id) {
			if ($("#new-section-item").val() != "")
			{
				$.ajax({
					type: 'post',
					url: Jobber.jobber_admin_url + 'translations/',
					data: {
						action: 'add_translation_section',
						item: $("#new-section-item").val(),
						lang_id: lang_id
					},
					success: function(response) {
						window.location.reload();
					}
				});	
			}
			else
			{
				alert("Please enter the new language's name and 2-letter code");
			}
		};
		
		var addTranslationItem = function(trigger_elem) {
			var section_id = $(trigger_elem).attr("rel");
			var item_field = $(trigger_elem).parents("tr").find(".new-translation-item");
			var value_field = $(trigger_elem).parents("tr").find(".new-translation-value");
			var item = item_field.val();
			var value = value_field.val();
			
			if (item != "" && value != "")
			{
				$.ajax({
					type: 'post',
					url: Jobber.jobber_admin_url + 'translations/',
					data: {
						action: 'add_translation_item',
						section_id: section_id,
						item: item,
						value: value
					},
					success: function(response) {
						item_field.val('');
						value_field.val('');
						new_item = '<tr><td><strong>' + item + '</strong></td><td><input type="text" size="70" value="' + Jobber.EscapeHTML(value) + '" /> ';
						new_item += '<a href="#" title="Delete this item" class="translation-item-delete" rel="' + response +'"><img src="' + Jobber.jobber_admin_url + '_tpl/img/bin.png" alt="Delete" /></a></td></tr>';

						$("table#translations_" + section_id + ":first").prepend(new_item);
						$("#new-translation-" + section_id).slideUp();
					}
				});	
			}
			else
			{
				alert("Please enter the new language's name and 2-letter code");
			}	
			return false;
		};
		
		var deleteTranslationItem = function(trigger_elem) {
			item_id = $(trigger_elem).attr("rel");
			
			$.ajax({
				type: 'post',
				url: Jobber.jobber_admin_url + 'translations/',
				data: {
					action: 'delete_translation_item',
					id: item_id
				},
				success: function(response) {
					$(trigger_elem).parent().parent().fadeOut();
				}
			});	
		};
		
		var deleteTranslationSection = function(trigger_elem) {
			section_id = $(trigger_elem).attr("rel");
			
			$.ajax({
				type: 'post',
				url: Jobber.jobber_admin_url + 'translations/',
				data: {
					action: 'delete_translation_section',
					id: section_id
				},
				success: function(response) {
					$(trigger_elem).parent().parent().fadeOut();
				}
			});	
		};
		
		var saveTranslationItemValue = function(id, value, element) {
			$.ajax({
				type: 'post',
				url: Jobber.jobber_admin_url + 'translations/',
				data: {
					action: 'save_translation_item',
					id: id,
					value: value
				},
				success: function(response) {
					response = parseInt(response);
					if (response == 1) {
						$(element).animate({backgroundColor: '#b4ff8e'}, 500).animate({backgroundColor: '#ffffff'}, 500);
					} else {
						$(element).animate({backgroundColor: '#ffb48e'}, 500);
					}
				}
			});
		};
		
		
		
		return {
			init: function() {
				
				// manage languages
				
				$("a#trans-manage-langs").click(function() {
					$("#translation-langs").toggle();
					return false;
				});
				
				$("button#add-lang-trigger").click(function() {
					addLanguage();
					return false;
				});
				
				$("a.lang-edit-trigger").click(function() {
					lang_code = $(this).attr("rel");
					editLanguage(lang_code);
					return false;
				});
				
				$("a.lang-cancel-trigger").click(function() {
					lang_code = $(this).attr("rel");
					$("tr." + lang_code + " td div.lang-edit").hide();
					$("tr." + lang_code + " td span").show();
					return false;
				});
				
				$("a.lang-delete-trigger").click(function() {
					if (confirm("Are you sure?"))
					{
						deleteLanguage($(this).attr("rel"));
					}
					return false;
				});
				
				$("a#cancel-add-section-trigger").click(function() {
					$("#new-translation-section").hide();
					return false;
				});
				
				
				// translations edit
				
				$("select#translations-lang").change(function() {
					window.location.href = Jobber.jobber_admin_url + "translations/edit/" + $(this).val();
				});
				
				$("#new-translation-section-trigger").click(function() {
					$("#new-translation-section").toggle();
					return false;
				});
				
				$("button#add-section-trigger").click(function() {
					addTranslationSection($(this).attr("rel"));
					return false;
				});
				
				$(".new-translation-trigger").click(function() {
					$(this).siblings(".new-translation").toggle();
					$(this).siblings(".new-translation").find("input.new-translation-item").focus();
					return false;
				});
				
				$(".new-transaction-cancel-trigger").click(function() {
					$(this).parents(".new-translation").hide();
					return false;
				});
				
				$("button.new-translation-add-trigger").click(function() {
					addTranslationItem($(this));
					return false;
				});

				$("a.translation-item-delete").live("click", function() { 
					if (confirm("Are you sure?"))
					{
						deleteTranslationItem($(this));
					}
					return false;
				});
				
				$("a.translation-section-delete").live("click", function() { 
					if (confirm("Are you sure you want to delete this section AND all translation items in it?"))
					{
						deleteTranslationSection($(this));
					}
					return false;
				});
				
				
				// store item's value on focus
				 $("table input[rel], table textarea[rel]").focus(function() {
					$.currently_selected_translation_item = { id: $(this).attr("rel"), val: $(this).val() };
				});
				// save item on blur, if value has changed
				$("table input[rel], table textarea[rel]").blur(function() {
					item_id = $(this).attr("rel");
					item_value = $(this).val();
					
					if ($.currently_selected_translation_item.id == item_id && $.currently_selected_translation_item.val != item_value)
					{
						saveTranslationItemValue(item_id, item_value, this);
					}
				});
				
			}
		};
	}();
	
	jobberBase.register(jobberBase.translations.init, 'init');
})();
