{if !$jobs}
<div id="no-ads">
	{if $CURRENT_PAGE != 'search'}
	<img src="{$BASE_URL}admin/_tpl/img/exclamation.png" alt="{$translations.manage.error}" /> <span class="error">{$translations.manage.invalid_auth}</span>
	{if $smarty.const.ENABLE_NEW_JOBS}
		<br /><br /><a href="{$BASE_URL}post/" title="{$translations.manage.new_job_title}">{$translations.footer.new_job}</a>
	{/if}
	{else}
	{$translations.jobs.no_job_found}<br />
	{/if}
</div><!-- #no-ads -->
{/if}
{foreach item=job from=$jobs}
	<div class="{cycle values='row,row-alt'}">
		<span class="row-info">
			<img src="{$BASE_URL}_tpl/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
			({$job.created_on})
		</span>
		<span class="time-posted">
		<a href="{$BASE_URL}view-applicants/{$job.id}/{$job.auth}/" title="{$translations.manage.view_job_applicants}" target="_blank">
		<img src="{$BASE_URL}admin/_tpl/img/user.png" alt="{$translations.manage.view_applicants}" />
		</a>
		<a href="{$BASE_URL}post/{$job.id}/{$job.auth}/" title="{$translations.manage.edit_job}" target="_blank">
		<img src="{$BASE_URL}admin/_tpl/img/pencil.png" alt="{$translations.manage.edit}" />
		</a>
		<a href="{$BASE_URL}deactivate/{$job.id}/{$job.auth}/" title="{$translations.manage.deactivate_job}" target="_blank">
		<img src="{$BASE_URL}admin/_tpl/img/switch_off.png" alt="{$translations.manage.deactivate}" />
		</a>
		</span>
	</div>
{/foreach}
<br/>
{$pages}
