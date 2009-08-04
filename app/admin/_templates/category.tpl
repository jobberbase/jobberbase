{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				<h2>
					{$translations.category.jobs_for} {$current_category_name}
				</h2>
				{include file="posts-loop.tpl"}
			</div><!-- #job-listings -->
		</div><!-- #content -->

{include file="footer.tpl"}