<!-- Jobs from the same company -->
{if count($compjobs) > 1}
<strong>{$translations.jobs.recent_jobs} <a href="{$BASE_URL}{$URL_JOBS_AT_COMPANY}/{$jobsat}/">{$job.company}</a></strong><br />
<div id="compjobs">
<table id="job-posts" class="job-posts" cellspacing="0">
{foreach item=compjob from=$compjobs}
{if $compjob.id != $job.id }
	<tr {cycle values='class="alt",'}>
		<td>
			<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$compjob.type_name}" />
			<a href="{$BASE_URL}{$URL_JOB}/{$compjob.id}/{$compjob.url_title}/" title="{$compjob.title}">{$compjob.title}</a> <span class="la">{$translations.homepage.at}</span> {$compjob.company}{if $compjob.location == 'Anywhere'}, {$compjob.location}{else} <span class="la">{$translations.homepage.in}</span> {$compjob.location}{/if}
		</td>
		<td class="time-posted"><img src="{$BASE_URL}_templates/{$THEME}/img/clock.gif" alt="" /> {$compjob.created_on}</td>
	</tr>
{/if}
{/foreach}
</table></div><br />
{/if}
<!-- Jobs from the same company -->