(function() 
{
	Jobber = {
		
		jobber_admin_url: "",
		
		HandleLocationOutsideRo: function()
		{
			if (document.getElementById("location_outside_ro").style.display == "none")
			{
				document.getElementById("city_id").setAttribute("disabled", "disabled");
				$("div#location_outside_ro").show();
				document.getElementById("location_outside_ro_where").focus();
				$("a#other_location_label").html(Jobber.I18n.js.location_pick_from_list);
			}
			else
			{
				document.getElementById("city_id").removeAttribute("disabled");
				$("div#location_outside_ro").hide();
				$("a#other_location_label").html(Jobber.I18n.js.location_other);
			}
		},
		DeactivateLink: function(job_id)
		{
			var url = Jobber.jobber_admin_url+'deactivate/';
			Jobber.Deactivate(url, job_id);
		},
		ActivateLink: function(job_id)
		{
			var url = Jobber.jobber_admin_url+'activate/';
			Jobber.Activate(url, job_id, 0);
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
							var deactivateJobFunction = function()
							{
								Jobber.DeactivateLink(job_id);
							};
							
							var linkElement = document.getElementById(currentLinkId);
							linkElement.setAttribute('title', 'Deactive this job');
							linkElement.setAttribute('onclick', deactivateJobFunction);
							linkElement.onclick = deactivateJobFunction;
							linkElement.innerHTML = '<img src="'+Jobber.jobber_admin_url+'_tpl/img/switch.png" alt="deactivate" />';
							linkElement.id = 'deactivateLink'+job_id;
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
						
						var activateJobFunction = function()
						{
							Jobber.ActivateLink(job_id);
						};
						
						var linkElement = document.getElementById(currentLinkId);
						linkElement.setAttribute('title', 'Activate this job');
						linkElement.setAttribute('onclick', activateJobFunction);
						linkElement.onclick = activateJobFunction;
						linkElement.innerHTML = '<img src="'+Jobber.jobber_admin_url+'_tpl/img/switch_off.png" alt="activate" />';
						linkElement.id = 'activateLink'+job_id;
					}
			  }
			});
		},
		
		DeactivateSpotlight: function(job_id)
        {
            var url = Jobber.jobber_admin_url+'deactivate-spotlight/';
            Jobber.SpotlightDeactivate(url, job_id);
        },
        ActivateSpotlight: function(job_id)
        {
            var url = Jobber.jobber_admin_url+'activate-spotlight/';
            Jobber.SpotlightActivate(url, job_id);
        },
        SpotlightActivate: function(url, job_id)
        {
            $.ajax({
              type: "POST",
              url: url,
              data: "job_id=" + job_id,
              success: function(msg) {
                   if (msg != "0")
                    {
                        var currentLinkId = 'activateSpotlight'+job_id;
                       
                        var deactivateSpotlightFunction = function()
						{
							Jobber.DeactivateSpotlight(job_id);
						};
						
						var linkElement = document.getElementById(currentLinkId);
						linkElement.setAttribute('title', 'Turn spotlight off');
                        linkElement.setAttribute('onclick', deactivateSpotlightFunction);
                        linkElement.onclick = deactivateSpotlightFunction; 
                        linkElement.innerHTML = '<img src="'+Jobber.jobber_admin_url+'_tpl/img/star_on.png" alt="deactivate" />';
                        linkElement.id = 'deactivateSpotlight'+job_id;
                    }
              }
            });
        },
        
        SpotlightDeactivate: function(url, job_id)
        {
            $.ajax({
              type: "POST",
              url: url,
              data: "job_id=" + job_id,
              success: function(msg) {
                   if (msg != "0")
                    {
                        var currentLinkId = 'deactivateSpotlight'+job_id;
                        var activateSpotlightFunction = function()
						{
							Jobber.ActivateSpotlight(job_id);
						};
						
						var linkElement = document.getElementById(currentLinkId);
						linkElement.setAttribute('title', 'Turn spotlight on');							
                        linkElement.setAttribute('onclick', activateSpotlightFunction);
                        linkElement.onclick = activateSpotlightFunction;
                        linkElement.innerHTML = '<img src="'+Jobber.jobber_admin_url+'_tpl/img/star_off.png" alt="activate" />';
                        linkElement.id = 'activateSpotlight'+job_id;
                    }
              }
            });
        },
		
		Delete: function(url, job_id)
		{
			if(confirm(Jobber.I18n.js.delete_job_confirmation_question))
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
		},

		EscapeHTML: function(text)
		{
			return text
				.replace(/&/g, "&amp;")
				.replace(/</g, "&lt;")
				.replace(/>/g, "&gt;")
				.replace(/"/g, "&quot;")
				.replace(/'/g, "&#039;");
		}
	}
})();
