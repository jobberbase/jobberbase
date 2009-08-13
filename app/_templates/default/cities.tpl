{include file="header.tpl"}

		<div id="content">
			<!-- #job-listings -->
			<h3 class="page-heading">{$translations.jobscity.title}</h3>
			{section name=tmp loop=$cities_overview}
			<span class="company-tag-{$cities_overview[tmp].tag_height}">
				<a href="{$BASE_URL}{$URL_JOBS_IN_CITY}/{$cities_overview[tmp].varname}">{$cities_overview[tmp].name} ({$cities_overview[tmp].count})</a>
			</span>
			{/section}
 
			{$translations.jobscity.total}: <strong>{$cities_count}</strong> {$translations.jobscity.cities}</div>
		<!-- /content -->
 
{include file="footer.tpl"}