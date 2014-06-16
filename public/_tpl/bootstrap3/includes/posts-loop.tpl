
{if $keywords}
    <div class="page-header">
        <h3>Search results for <strong>{$keywords}</strong></h3>
    </div>
{/if}

{if !$jobs}
    {if $CURRENT_PAGE != 'search'}
        {if $current_category_id}
            <div class="alert alert-info">{$translations.jobs.no_job} <strong>{$current_category_name}</strong>.</div>
        {else}
            <div class="alert alert-info">{$translations.alljobs.no_jobs}</div>
        {/if}

        {if $smarty.const.ENABLE_NEW_JOBS}
            <p><a href="{$BASE_URL}post/" class="btn btn-primary" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a></p>
        {/if}
    {else}
        <div class="alert alert-info">{$translations.jobs.no_job_found}</div>
    {/if}
{else}
    {include file="includes/jobs-list.tpl"}
{/if}