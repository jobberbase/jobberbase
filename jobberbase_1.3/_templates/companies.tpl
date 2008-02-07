{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading">Companies that published here</h3>
			{section name=tmp loop=$companies}
			<span class="company-tag-{$companies[tmp].tag_height}">
				<a href="{$BASE_URL}jobs-at/{$companies[tmp].varname}/">{$companies[tmp].name} ({$companies[tmp].count})</a>
			</span>
			{/section}
			<br /><br />
			<p>
				Total: <strong>{$companies_count}</strong> companies
			</p>
		</div><!-- /content -->

{include file="footer.tpl"}