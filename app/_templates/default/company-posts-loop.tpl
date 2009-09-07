<!-- Jobs from the same company -->
{if count($compjobs) > 1}
<strong>{$translations.jobs.recent_jobs} {$job.company}</strong><br /><br />
<table id="job-posts" class="job-posts" cellspacing="0">
{foreach item=compjob from=$compjobs}
{if $compjob.id != $job.id }
<tr>
	<td>
	<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
	<a href="{$BASE_URL}job/{$compjob.id}/{$compjob.url_title}/" title="{$compjob.title}">{$compjob.title}</a> <span class="la">{$translations.homepage.at}</span> {$compjob.company}{if $compjob.location == 'Anywhere'}, {$compjob.location}{else} <span class="la">{$translations.homepage.in}</span> {$compjob.location}{/if}
	</td>
	<td class="time-posted"><img src="{$BASE_URL}_templates/{$THEME}/img/clock.gif" alt="" /> {$compjob.created_on}</td>
</tr>
{/if}
{/foreach}
</table><br />
<a href="{$BASE_URL}jobs-at/{$jobsat}/">{$translations.jobs.all_jobs}</a><strong> {$job.company}</strong>
<br /><br />
{/if}
<!-- Jobs from the same company -->
{literal}
<script type="text/javascript">
$(document).ready(function()
{
	$(".job-posts tr").mouseover(function() {$(this).addClass("over");}).mouseout(function() {$(this).removeClass("over");});
	$(".job-posts tr:odd").addClass("alt");
});
</script>
{/literal}