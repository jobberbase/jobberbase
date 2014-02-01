{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				<h2>
					{$translations.manage.manage_jobs} {if $poster_email != ''}({$poster_email}){/if}
				</h2>
				{include file="posts-loop-manage.tpl"}
			</div><!-- #job-listings -->
		</div><!-- #content -->

{include file="footer.tpl"}