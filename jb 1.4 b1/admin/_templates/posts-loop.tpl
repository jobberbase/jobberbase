{if $is_home == 1}
<div><a href="{$BASE_URL}">&laquo; home</a></div>
{/if}
{if $no_categ != 1}
<table id="job-posts" class="job-posts" cellspacing="0">
{if $keywords}
	<tr><td colspan="3" class="search_results_label">
		Search results for <strong>{$keywords}</strong>:
	</td></tr>
{/if}
{if !$jobs}
<div id="no-ads">
	{if $CURRENT_PAGE != 'search'}
	No jobs, yet.<br />
	{else}
	No jobs were found.<br />
	{/if}
</div><!-- #no-ads -->
{/if}
{foreach item=job from=$jobs name=tmp}

	<tr id="item{$job.id}">
		<td>
			{if $job.type_id == $smarty.const.JOBTYPE_FULLTIME}
			<img src="{$BASE_URL}img/icon-fulltime.png" alt="full-time" />
			{elseif $job.type_id == $smarty.const.JOBTYPE_PARTTIME}
			<img src="{$BASE_URL}img/icon-parttime.png" alt="part-time" />
			{elseif $job.type_id == $smarty.const.JOBTYPE_FREELANCE}
			<img src="{$BASE_URL}img/icon-freelance.png" alt="freelance" />
			{/if}
			<a href="{$BASE_URL_ADMIN}job/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">at</span> {$job.company}{if $job.location == 'Anywhere'}, {$job.location}{else} <span class="la">in</span> {$job.location}{/if}
		</td>
		<td class="time-posted"><img src="{$BASE_URL}img/clock.gif" alt="" /> {$job.created_on}</td>
		<td style="font-size: 11px;">
			{if $job.is_active == 0}
				<a id="activateLink{$job.id}" href="javascript:void(0);" onclick="Jobber.Activate('{$BASE_URL_ADMIN}activate/', {$job.id}, {if $CURRENT_PAGE == ''}1{else}0{/if});" title="activate"><img src="{$BASE_URL}img/icon_accept.gif" alt="activate" /></a>
			{else}
				<a id="deactivateLink{$job.id}" href="javascript:void(0);" onclick="Jobber.Deactivate('{$BASE_URL_ADMIN}deactivate/', {$job.id});" title="deactivate"><img src="{$BASE_URL}img/icon_deactivate.gif" alt="deactivate" /></a>
			{/if}&nbsp;
			<a href="javascript:void(0);" onclick="Jobber.Delete('{$BASE_URL_ADMIN}delete/', {$job.id});" title="delete"><img src="{$BASE_URL}img/icon-delete.png" alt="delete" /></a>
		</td>
	</tr>
{/foreach}
</table>
<br/>
{$pages}
{/if}
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$(".job-posts tr").mouseover(function() {$(this).addClass("over");}).mouseout(function() {$(this).removeClass("over");});
		$(".job-posts tr:odd").addClass("alt");
	});
</script>
{/literal}