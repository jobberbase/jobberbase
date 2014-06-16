
{if count($compjobs) > 1}
    <h3>{$translations.jobs.recent_jobs} <a href="{$BASE_URL}{$URL_JOBS_AT_COMPANY}/{$jobsat}/">{$job.company}</a></h3>

    <table class="table table-hover table-striped table-jobs">
        {foreach item=compjob from=$compjobs}
            {if $compjob.id != $job.id }
                <tr>
                    <td class="job-type">
                        {$type = $compjob.type_var_name}
                        {if $type eq 'fulltime'}
                            {$class = 'success'}
                        {elseif $type eq 'parttime'}
                            {$class = 'info'}
                        {elseif $type eq 'freelance'}
                            {$class = 'warning'}
                        {else}
                            {$class = 'default'}
                        {/if}
                        <span class="label label-{$class}">{$compjob.type_name}</span>
                    </td>
                    <td>
                        <a href="{$BASE_URL}{$URL_JOB}/{$compjob.id}/{$compjob.url_title}/" title="{$compjob.title}">{$compjob.title}</a> <span class="la">{$translations.homepage.at}</span> {$compjob.company}{if $compjob.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$compjob.location}{/if}
                    </td>
                    <td class="text-right">{$job.created_on}</td>
                </tr>
            {/if}
        {/foreach}
    </table>
{/if}