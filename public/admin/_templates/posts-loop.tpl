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

	<tr id="item{$job.id}" {cycle values='class="alt",'}>
		<td>
			<img src="{$BASE_URL_ADMIN}img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
			<a href="{$BASE_URL_ADMIN}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">at</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">in</span> {$job.location}{/if}
			<div style="font-size: 12px; margin-top: 5px;">viewed {$job.views_count} times{if $statisticalData[$job.id]}, {$statisticalData[$job.id].numberOfApplications} applicants, last application on {$statisticalData[$job.id].lastApplicationOn}{/if}</div>
		</td>
		<td class="time-posted"><img src="{$BASE_URL_ADMIN}img/clock.gif" alt="" /> {$job.created_on}</td>
		<td style="font-size: 11px;">
			<a href="{$BASE_URL_ADMIN}edit-post/{$job.id}/" title="edit"><img src="{$BASE_URL_ADMIN}img/icon_edit.gif" alt="edit" /></a>
			 {if $job.is_spotlight == 0}
		        <a id="activateSpotlight{$job.id}" href="javascript:void(0);" onclick="Jobber.SpotlightActivate('{$BASE_URL_ADMIN}activate-spotlight/', {$job.id}, {if $CURRENT_PAGE == ''}1{else}0{/if});" title="activate-spotlight"><img src="{$BASE_URL_ADMIN}img/icon_spotlight_activate.gif" alt="activate" /></a>
		    {else}
		        <a id="deactivateSpotlight{$job.id}" href="javascript:void(0);" onclick="Jobber.SpotlightDeactivate('{$BASE_URL_ADMIN}deactivate-spotlight/', {$job.id});" title="deactivate-spotlight"><img src="{$BASE_URL_ADMIN}img/icon_spotlight_deactivate.gif" alt="deactivate" /></a>
		    {/if}&nbsp;
			{if $job.is_active == 0}
				<a id="activateLink{$job.id}" href="javascript:void(0);" onclick="Jobber.Activate('{$BASE_URL_ADMIN}activate/', {$job.id}, {if $CURRENT_PAGE == ''}1{else}0{/if});" title="activate"><img src="{$BASE_URL_ADMIN}img/icon_accept.gif" alt="activate" /></a>
			{else}
				<a id="deactivateLink{$job.id}" href="javascript:void(0);" onclick="Jobber.Deactivate('{$BASE_URL_ADMIN}deactivate/', {$job.id});" title="deactivate"><img src="{$BASE_URL_ADMIN}img/icon_deactivate.gif" alt="deactivate" /></a>
			{/if}&nbsp;
			<a href="javascript:void(0);" onclick="Jobber.Delete('{$BASE_URL_ADMIN}delete/', {$job.id});" title="delete"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="delete" /></a>
		</td>
	</tr>
{/foreach}
</table>
<br/>
{$pages}
{/if}