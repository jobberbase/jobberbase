{if $page}
    {$page.content}
{/if}

{if $spotlight_jobs}
    <h3>{$translations.homepage.spotlight_jobs}</h3>
    {include file="includes/jobs-list.tpl" jobs=$spotlight_jobs spotlight=true}
{/if}

{if $latest_jobs}
    <h3>{$translations.homepage.recent_jobs}</h3>
    {include file="includes/jobs-list.tpl" jobs=$latest_jobs}

    <div id="view_all">
        <a href="{$BASE_URL}{$URL_JOBS}/" class="btn btn-default">{$translations.homepage.view_all_jobs}</a>
    </div>
{/if}

{if $most_applied_to_jobs}
    <h3>{$translations.homepage.popular_jobs}</h3>
    {include file="includes/jobs-list.tpl" jobs=$most_applied_to_jobs applicants=true}
{/if}

{if !$latest_jobs && !$most_applied_to_jobs}
    <p class="alert alert-info">{$translations.homepage.no_jobs}.</p>
    <p><a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>?</p>
{/if}