{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				{if $jobs}
				<div id="sort-by-type">
					Only display&nbsp; 
					<a href="{$BASE_URL}jobs/{$current_category}/full-time/" title="{$current_category} full time"><img src="{$BASE_URL}img/icon-fulltime.png" alt="{$current_category} full time" /></a>
					<a href="{$BASE_URL}jobs/{$current_category}/part-time/" title="{$current_category} part time"><img src="{$BASE_URL}img/icon-parttime.png" alt="{$current_category} part time" /></a>
					<a href="{$BASE_URL}jobs/{$current_category}/freelance/" title="{$current_category} freelance"><img src="{$BASE_URL}img/icon-freelance.png" alt="{$current_category} freelance" /></a>
				</div><!-- #sort-by-type -->
				{/if}
				<h2>
					Jobs for {$current_category}
				</h2>
				{include file="posts-loop.tpl"}
			</div><!-- #job-listings -->
		</div><!-- #content -->

{include file="footer.tpl"}