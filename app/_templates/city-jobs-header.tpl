{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				{if $jobs}
				<div id="sort-by-type">
				{$translations.category.display_only}&nbsp; 
					<a href="{$BASE_URL}jobs-in/{$city_ascii_name}/full-time/" title="{$current_category} fulltime"><img src="{$BASE_URL}img/icon-fulltime.png" alt="{$current_category} fulltime" /></a>
					<a href="{$BASE_URL}jobs-in/{$city_ascii_name}/part-time/" title="{$current_category} parttime"><img src="{$BASE_URL}img/icon-parttime.png" alt="{$current_category} parttime" /></a>
					<a href="{$BASE_URL}jobs-in/{$city_ascii_name}/freelance/" title="{$current_category} freelance"><img src="{$BASE_URL}img/icon-freelance.png" alt="{$current_category} freelance" /></a>
				</div><!-- #sort-by-type -->
				{/if}
				<h2>
					{$translations.jobscity.jobs_in} {$city_name}
				</h2>
				{include file="posts-loop-city.tpl"}
			</div><!-- #job-listings -->
		</div><!-- #content -->

{include file="footer.tpl"}