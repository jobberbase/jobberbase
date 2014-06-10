{include file="includes/header.tpl"}
		
<div class="page-header">
    <h2>
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

        <span class="label label-{$class}">{$job.type_name}</span> {$job.title}
    </h2>
</div>

<p>
    <span class="fading">{$translations.jobs.preposition_at}</span>
    {if $job.url && $job.url != 'http://'}
        <a href="{$job.url}">{$job.company}</a>
    {else}
        <strong>{$job.company}</strong>
    {/if}
    {if $job.is_location_anywhere}
        <strong>({$translations.jobs.location_anywhere})</strong>
    {else}
        <span class="fading">{$translations.homepage.in}</span> <strong>{$job.location}</strong>
    {/if}
</p>

<div id="job-description" class="well">
    {$job.description}
</div>

<h3>{$count_jobs} {$translations.applications.title}</h3>

{if count($applicants) > 0}
    <table id="apply" class="table table-striped">
        <tr class="title">
            <td><strong>{$translations.applications.name}</strong></td>
            <td><strong>{$translations.applications.email}</strong></td>
            <td><strong>{$translations.applications.date}</strong></td>
            <td><strong>{$translations.applications.cv}</strong></td>
        </tr>
        {foreach item=applicant from=$applicants}
            <tr>
                <td>{$applicant.name}</td>
                <td><a href="mailto:{$applicant.email}">{$applicant.email}</a></td>
                <td>{$applicant.created_on|date_format}</td>
                <td>
                    {if $applicant.cv_path}
                        <a href="{$cv_path}{$applicant.cv_path}" title="{$translations.applications.download_cv}">
                            {$translations.applications.download}
                        </a>
                    {/if}
                </td>
            </tr>
            <tr class="row-alt">
                <td colspan="4"><p>{$applicant.message}</p></td>
            </tr>
        {/foreach}
    </table>

    <br/>
    {$pages}

{else}
    <p>{$translations.applications.no_applicants}</p>
{/if}

{include file="includes/footer.tpl"}