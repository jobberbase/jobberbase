{include file="includes/header.tpl"}

<div class="page-header">
    <h2>{$translations.companies.title}</h2>
</div>

<ul class="list-unstyled">
    {section name=tmp loop=$companies}
        <li class="company-tag-{$companies[tmp].tag_height}">
            <a href="{$BASE_URL}{$URL_JOBS_AT_COMPANY}/{$companies[tmp].varname}/">{if $companies[tmp].name}{$companies[tmp].name}{else}{$translations.jobs.company_undisclosed}{/if} ({$companies[tmp].count})</a>
        </li>
    {/section}
</ul>

<p>{$translations.companies.total}: <strong>{$companies_count}</strong> {$translations.companies.companies}</p>

{include file="includes/footer.tpl"}
