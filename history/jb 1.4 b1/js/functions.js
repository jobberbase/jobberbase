(function() 
{
	Jobber = {
		
		jobber_url: "",
		jobber_admin_url: "",
		job_id: "",
		
		FixPng: function()
		{
			var arVersion = navigator.appVersion.split("MSIE");
			var version = parseFloat(arVersion[1]);

			if ((version >= 5.5) && (document.body.filters)) 
			{
			   for(var i=0; i<document.images.length; i++)
			   {
			      var img = document.images[i];
			      var imgName = img.src.toUpperCase();

			      if (imgName == this.jobber_url.toUpperCase() + "IMG/BT-RSS.PNG")
			      {
			         var imgID = (img.id) ? "id='" + img.id + "' " : "";
			         var imgClass = (img.className) ? "class='" + img.className + "' " : "";
			         var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' ";
			         var imgStyle = "display:inline-block;" + img.style.cssText;
			         if (img.align == "left") imgStyle = "float:left;" + imgStyle;
			         if (img.align == "right") imgStyle = "float:right;" + imgStyle;
			         if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle;
			         var strNewHTML = "<span " + imgID + imgClass + imgTitle;
			         strNewHTML += " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";";
			         strNewHTML += "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader";
			         strNewHTML += "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>";
			         img.outerHTML = strNewHTML;
			         i = i - 1;
			      }
			   }
			}

		},
		
		PerformSearch: function(url)
		{
			clearTimeout(window.search_timer);	
			$('#job-listings').load(url + encodeURIComponent($('#keywords').fieldValue()) + '/');	
			$("#indicator").hide();	
		},
		
		HandleLocationOutsideRo: function()
		{
			if (document.getElementById("location_outside_ro").style.display == "none")
			{
				document.getElementById("city_id").setAttribute("disabled", "disabled");
				$("div#location_outside_ro").show();
				document.getElementById("location_outside_ro_where").focus();
				$("a#other_location_label").html("pick one from the list");
			}
			else
			{
				document.getElementById("city_id").removeAttribute("disabled");
				$("div#location_outside_ro").hide();
				$("a#other_location_label").html("other");
			}
		},
		
		CopyPasteUrl: function()
		{
			if (window.location.href.search("#") != -1)
			{
				var url = window.location.href.substring(0, window.location.href.length - 7);
			}
			else
			{
				var url = window.location.href;
			}
			document.getElementById("apply_url").value = url;
		},
		
		SendToFriend: {
			showHide: function()
			{
				$("#send-to-friend").SwitchVertically(10);
			},

			sendMsg: function()
			{
				$("#frm-send-to-friend").ajaxForm(function(responseText) { 
					if (responseText == "0")
					{
						var msg = "Your message could not be sent. Did you enter both addresses?";
						$("#send-to-friend-response").css({ color: "red" });
					}
					else
					{
						var msg = "Your message was sent. Let's hope it doesn't get marked as spam!";
						$("#frm-send-to-friend").clearForm();
						$("#send-to-friend-response").css({ color: "green" });
					}
					$("#send-to-friend-response").html(msg);
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
						var status = "Thank you for your intention, but your vote could not be registered.";
						$("#report-spam-response").css({ color: "red" });
					}
					else
					{
						var status = "Thank you, your vote was registered and is highly appreciated!";
						$("#frm-send-to-friend").clearForm();
						$("#report-spam-response").css({ color: "green" });
					}
					$("#report-spam-response").html(status);
			  }
			});
		},
		DeactivateLink: function()
		{	
			
			var url = Jobber.jobber_admin_url+'deactivate/';
			Jobber.Deactivate(url, Jobber.job_id);
			
		},
		ActivateLink: function()
		{	
			
			var url = Jobber.jobber_admin_url+'activate/';
			Jobber.Activate(url, Jobber.job_id, 0);
			
		},
		Activate: function(url, job_id, is_first_page)
		{
			$.ajax({
			  type: "POST",
			  url: url,
			  data: "job_id=" + job_id,
			  success: function(msg) {
			   	if (msg != "0")
					{
						var currentRowId = 'item'+job_id;
						var currentLinkId = 'activateLink'+job_id;
						if(is_first_page == 1)
						{
							$("#"+currentRowId).css({ display: "none" });
						}
						else
						{
							 Jobber.job_id = job_id;
							 document.getElementById(currentLinkId).setAttribute('onclick', Jobber.DeactivateLink);
							 document.getElementById(currentLinkId).onclick = Jobber.DeactivateLink; 
							 document.getElementById(currentLinkId).innerHTML = '<img src="'+Jobber.jobber_url+'img/icon_deactivate.gif" alt="deactivate" />';
							 document.getElementById(currentLinkId).id = 'deactivateLink'+job_id;
						}	
					}
			  }
			});
		},
		
		Deactivate: function(url, job_id)
		{
			$.ajax({
			  type: "POST",
			  url: url,
			  data: "job_id=" + job_id,
			  success: function(msg) {
			   	if (msg != "0")
					{
						var currentLinkId = 'deactivateLink'+job_id;
						Jobber.job_id = job_id;
						document.getElementById(currentLinkId).setAttribute('onclick', Jobber.ActivateLink);
						document.getElementById(currentLinkId).onclick = Jobber.ActivateLink;
						document.getElementById(currentLinkId).innerHTML = '<img src="'+Jobber.jobber_url+'img/icon_accept.gif" alt="activate" />';
						document.getElementById(currentLinkId).id = 'activateLink'+job_id;
					}
			  }
			});
		},
		
		Delete: function(url, job_id)
		{
			if(confirm('Are you sure you want to delete this post?'))
			{
				$.ajax({
				  type: "POST",
				  url: url,
				  data: "job_id=" + job_id,
				  success: function(msg) {
				   	if (msg != "0")
						{
							var currentJobId = 'item'+job_id;
							$("#"+currentJobId).css({ display: "none" });
						}
				  }
				});
			}
			else
				return false;
		}
	}
})();