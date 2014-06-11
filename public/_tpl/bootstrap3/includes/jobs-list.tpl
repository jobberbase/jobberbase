{if !isset($spotlight)}
    {$spotlight = false}
{/if}
{if !isset($manage)}
    {$manage = false}
{/if}
{if !isset($applicants)}
    {$applicants = false}
{/if}

<table class="table table-hover table-striped table-jobs">
    {foreach item=job from=$jobs}
        {$type = $job.type_var_name}
        {if $type eq 'fulltime'}
            {$class = 'success'}
        {elseif $type eq 'parttime'}
            {$class = 'info'}
        {elseif $type eq 'freelance'}
            {$class = 'warning'}
        {else}
            {$class = 'default'}
        {/if}
        <tr>
            <td class="job-type hidden-xs">
                <span class="label label-{$class}">{$job.type_name}</span>
            </td>
            <td>
                <p class="visible-xs"><span class="label label-{$class}">{$job.type_name}</span></p>
                <a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
            </td>
            <td class="last text-right">
                {if $spotlight}
                    <span class="label label-warning">Spotlight</span>
                {elseif $applicants}
                    <strong>{$job.apps}</strong> {$translations.homepage.applicants}
                {else}
                    {$job.created_on}
                {/if}
            </td>
            {if $manage}
                <td class="text-right">
                    <a href="{$BASE_URL}view-applicants/{$job.id}/{$job.auth}/" title="{$translations.manage.view_job_applicants}" class="btn btn-default">
                        <i class="glyphicon glyphicon-user"></i>
                    </a>
                    <a href="{$BASE_URL}post/{$job.id}/{$job.auth}/" title="{$translations.manage.edit_job}" class="btn btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="{$BASE_URL}deactivate/{$job.id}/{$job.auth}/" title="{$translations.manage.deactivate_job}" class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                </td>
            {/if}
        </tr>
    {/foreach}
</table>