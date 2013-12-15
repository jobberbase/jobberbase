	</div><!-- #mainbody -->
	<div class="footer clearfix">
		<div id="footer-contents" class="clearfix">
			{if $navigation.footer}
				{foreach from=$navigation.footer item=item}
					<div class="footer-col">
						{$item.name}<br />
						{if $item.children}
							{foreach from=$item.children item=subitem}
								<a href="{if $subitem.outside != 1}{$BASE_URL}{/if}{$subitem.url}{if ($subitem.outside != 1) && ($subitem.url != '')}/{/if}" title="{$subitem.title}" >{$subitem.name}</a><br />
							{/foreach}
						{/if}
					</div>
				{/foreach}
			{/if}
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
			  $('.domtab').tabs();

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
				var searchKeywords = jQuery.trim(this.value);
				var len = searchKeywords.length;
				
			    if (key.keyCode != 9 && len >= 3)
				{
					$("#indicator").show();	
					clearTimeout(window.search_timer);	
					window.search_timer = setTimeout(function(){Jobber.PerformSearch('{/literal}{$BASE_URL}{literal}search/{/literal}{$current_category}{literal}|', searchKeywords)}, 800);
			    }
			});
		});
		Jobber.jobber_url = "{/literal}{$BASE_URL}{literal}";
		//]]>
	</script>
	{/literal}
</body>
</html>
