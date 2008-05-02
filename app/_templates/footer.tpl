	</div><!-- #container -->
	<div class="footer">
		<div id="footer-contents">
			<div id="footer-col1">
				{$translations.footer.column_use}:<br />
				<a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a><br />
				<a href="{$BASE_URL}{$articles.widgets.url}/" title="{$articles.widgets.page_title}">{$articles.widgets.title}</a><br />
				<a href="{$BASE_URL}rss/" title="{$translations.footer.rss_title}">{$translations.footer.rss}</a><br />
			</div>
			<div id="footer-col2">
				{$translations.footer.column_find}:<br />
				<a href="{$BASE_URL}{$articles.about.url}/" title="{$articles.about.page_title}">{$articles.about.title}</a><br />
				<a href="{$BASE_URL}{$articles.contact.url}/" title="{$articles.contact.page_title}">Contact</a>
			</div>
			<div id="footer-col3">
				{$translations.footer.column_misc}:<br />
				<a href="{$BASE_URL}companies/" title="{$translations.footer.companies_title}">{$translations.footer.companies}</a><br />
				<a href="{$BASE_URL}sitemap/" title="{$translations.sitemap.title}">{$translations.sitemap.title}</a><br />
			</div>
			<div id="footer-copyright">
				{$translations.footer.powered_by}
				<a href="http://www.jobberbase.com/" title="open source job board software">jobberBase</a>
			</div>
			<div class="clear"></div>
		</div><!-- #footer-contents -->
	</div><!-- .footer -->
	{literal}
	<script type="text/javascript">
		//<![CDATA[
		
 		$(document).ready(function()
		{
		   var keywords = $('#keywords');
			// setup search box
			keywords.bind('click', function() {
				if (this.value == '{/literal}{$translations.search.default}{literal}')
				{
					keywords.clearFields();
				}
			});

			keywords.bind('blur', function() {  
				if (this.value == '{/literal}{$translations.search.default}{literal}' || this.value == '')
				{
					this.value = '{/literal}{$translations.search.default}{literal}';
				}
			});

			// setup live search
			keywords.keyup(function(key) {
				if (this.value == '')
				{
					$('#job-listings').load('{/literal}{$BASE_URL}{literal}search/{/literal}{$current_category}{literal}|/');
				}
				//var len = document.getElementById('keywords').value.length;
				var len = this.value.length;
			  if (key.keyCode != 9 && len >= 3)
				{
					$("#indicator").show();	
					clearTimeout(window.search_timer);	
					window.search_timer = setTimeout("Jobber.PerformSearch('{/literal}{$BASE_URL}{literal}search/{/literal}{$current_category}{literal}|')", 800);
			  }
			});
		});
		Jobber.jobber_url = "{/literal}{$BASE_URL}{literal}";
		//]]>
	</script>
	{/literal}
	{php}
	  if (isset($_SESSION['status']))
		{
			unset($_SESSION['status']);
		}
		if (isset($_SESSION['apply_mail_sent']))
		{
			unset($_SESSION['apply_mail_sent']);
		}
		if (isset($_SESSION['apply_errors']))
		{
			unset($_SESSION['apply_errors']);
		}
		if (isset($_SESSION['apply_fields']))
		{
			unset($_SESSION['apply_fields']);
		}
		if (isset($_SESSION['contact_msg_sent']))
		{
			unset($_SESSION['contact_msg_sent']);
		}
		if (isset($_SESSION['contact_errors']))
		{
			unset($_SESSION['contact_errors']);
		}
		if (isset($_SESSION['contact_fields']))
		{
			unset($_SESSION['contact_fields']);
		}
	{/php}
</body>
</html>