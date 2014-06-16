{include file="includes/header.tpl"}

<div class="page-header">
    <h2>{$translations.jobscity.title}</h2>
</div>

<ul class="list-unstyled">
    {section name=tmp loop=$cities_overview}
    <li class="company-tag-{$cities_overview[tmp].tag_height}">
        <a href="{$BASE_URL}{$URL_JOBS_IN_CITY}/{$cities_overview[tmp].varname}">{$cities_overview[tmp].name} ({$cities_overview[tmp].count})</a>
    </li>
    {/section}
    {if $jobs_count_in_other_cities > 0}
        <li class="company-tag-{$jobs_count_in_other_cities_tag_height}">
            <a href="{$BASE_URL}jobs-in-other-cities/">{$translations.jobscity.other_cities} ({$jobs_count_in_other_cities})</a>
        </li>
    {/if}
</ul>

<p>{$translations.jobscity.total}: <strong>{$total_number_of_jobs}</strong> {$translations.jobscity.jobs}</p>
 
{include file="includes/footer.tpl"}