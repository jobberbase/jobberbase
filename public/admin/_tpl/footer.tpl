	</div><!-- #wrap -->
	<div class="footer clear">
	</div><!-- .footer -->
	
	<div id="overlay"><img src="{$BASE_URL_ADMIN}_tpl/img/ajax-loader.gif" /></div>
	<div id="messagesContainer"></div>
	
	{if $CURRENT_PAGE == "categories"}
	<div id="help" style="display: none;">
		<p class="bold">Categories help</p>
		<ul>
			<li><strong>Name</strong>: The name that will be used in the template</li>
			<li><strong>Title</strong>:</li>
			<li><strong>Description</strong>:</li>
			<li><strong>Keywords</strong>:</li>
			<li><strong>URL</strong>:</li>
		</ul>
	</div>
	{/if}
	
	<script type="text/javascript">
	{literal}

		Jobber.jobber_admin_url = "{/literal}{$BASE_URL_ADMIN}{literal}";
		Jobber.I18n = {/literal}{$translationsJson}{literal};
		
		{/literal}{if $editor}{*
		tinyMCE_GZ.init({literal}{{/literal}
			plugins : 'style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras',
			themes : 'advanced',
			languages : 'en',
			disk_cache : true,
			debug : false
		{literal}}{/literal});*}{/if}{literal}
	
		$(document).ready(function() {
			$("ul.sf-menu").superfish({ 
				animation: {height:'show'},
				delay: 1500
			});
			
			$("a.iframe").fancybox({
				hideOnContentClick: true,
				frameWidth: 980,
				frameHeight: 500
			});
		}); 
	{/literal}
	</script>
</body>
</html>
