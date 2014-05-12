{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				<h2>
					{if $current_company}{$translations.companies.jobs_at} {$current_company}{else}{$translations.companies.jobs_at_undisclosed}{/if}
				</h2>
				{include file="posts-loop.tpl"}
			</div><!-- #job-listings -->
		</div><!-- #content -->

{include file="footer.tpl"}
