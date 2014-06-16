{include file="includes/header.tpl"}

<div class="page-header">
    <h2>
        {if $current_company}{$translations.companies.jobs_at} {$current_company}{else}{$translations.companies.jobs_at_undisclosed}{/if}
    </h2>
</div>

<div id="job-listings">
    {include file="includes/posts-loop.tpl"}
</div>

{include file="includes/footer.tpl"}
