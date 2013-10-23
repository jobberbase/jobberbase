(function() 
{
	Jobber = {
		
		jobber_url: "",
		
		PerformSearch: function(url, keywords)
		{
			clearTimeout(window.search_timer);	
			$('#job-listings').load(url + encodeURIComponent(keywords) + '/');	
			$("#indicator").hide();	
		},
		
		HandleLocationOutsideRo: function()
		{
			if ($("#location_outside_ro").is(":visible"))
			{
				$("#city_id").removeAttr("disabled");
				$("#location_outside_ro").hide();
				$("#other_location_label").html(Jobber.I18n.js.location_other);
			}
			else
			{
				$("#city_id").attr("disabled", "disabled");
				$("#location_outside_ro").show();
				$("#location_outside_ro_where").focus();
				$("#other_location_label").html(Jobber.I18n.js.location_pick_from_list);
			}
		},
		
		SendToFriend: {
			showHide: function()
			{
				$("#send-to-friend").toggle();
			},

			init: function()
			{
				$("#frm-send-to-friend").ajaxForm(function(responseText) { 
					if (responseText == "0")
					{
						var msg = Jobber.I18n.js.send_to_friend_unsuccessful;
						$("#send-to-friend-response").css({ color: "red" });
					}
					else
					{
						var msg = Jobber.I18n.js.send_to_friend_successful;
						$("#frm-send-to-friend").clearForm();
						$("#send-to-friend-response").css({ color: "green" });
					}
					$("#send-to-friend-response").html(msg);
				});
			}
		},

		Subscribe: {
			showHide: function()
			{
				$("#subscribe").toggle();
			},

			init: function()
			{
				$("#frm-subscribe").ajaxForm(function(responseText) {
					if (responseText == "1")
					{
						var msg = Jobber.I18n.js.subscribe_successful;
						$("#frm-subscribe").clearForm();
						$("#subscribe-response").css({ color: "green" });
					}
					else
					{
						var msg = Jobber.I18n.js.subscribe_unsuccessful;
						$("#subscribe-response").css({ color: "red" });
					}
					$("#subscribe-response").html(msg);
				});
			}
		},

		ReportSpam: function(url, job_id)
		{
			$.ajax({
			  type: "POST",
			  url: url,
			  data: "job_id=" + job_id,
			  success: function(msg) {
			   	if (msg == "0")
					{
						var status = Jobber.I18n.js.report_spam_unsuccessful;
						$("#report-spam-response").css({ color: "red" });
					}
					else
					{
						var status = Jobber.I18n.js.report_spam_successful;
						$("#frm-send-to-friend").clearForm();
						$("#report-spam-response").css({ color: "green" });
					}
					$("#report-spam-response").html(status);
			  }
			});
		},

		InitEditor: function() {
			if (typeof tinyMCE != 'object') {
				return;
			}
			tinyMCE.init({
				mode : "specific_textareas",
				theme : "simple",
				editor_selector : "mceEditor"
			});
		}
	}
})();
