{if $page}
    {$page.content}
{/if}

{if $spotlight_jobs}
    <div class="">
        <h3>{$translations.homepage.spotlight_jobs}</h3>
        {include file="includes/jobs-list.tpl" jobs=$spotlight_jobs spotlight=true}
    </div>
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

    <table class="table table-hover table-striped table-jobs">
        {foreach item=job from=$most_applied_to_jobs}
            <tr>
                <td class="job-type">
                    {if $job.type_var_name eq 'fulltime'}
                        <span class="label label-success">{$job.type_name}</span>
                    {elseif $job.type_var_name eq 'parttime'}
                        <span class="label label-info">{$job.type_name}</span>
                    {elseif $job.type_var_name eq 'freelance'}
                        <span class="label label-warning">{$job.type_name}</span>
                    {else}
                        <span class="label label-default">{$job.type_name}</span>
                    {/if}
                </td>
                <td>
                    <a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
                </td>
                <td class="text-right"><strong>{$job.apps}</strong> {$translations.homepage.applicants}</td>
            </tr>
        {/foreach}
    </table>
{/if}

{if !$latest_jobs && !$most_applied_to_jobs}
    <p class="alert alert-info">{$translations.homepage.no_jobs}.</p>
    <p><a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>?</p>
{/if}