{if $is_home == 1}
<div><a href="{$BASE_URL}">&laquo; home</a></div>
{/if}
{if $no_categ != 1}
{if !$jobs}
<div id="no-ads">
	{$translations.jobscity.no_jobs_in_other_cities}
	{if $smarty.const.ENABLE_NEW_JOBS}
		<br /><a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>
	{/if}
</div><!-- #no-ads -->
{/if}
{foreach item=job from=$jobs}
	<div class="{cycle values='row,row-alt'}">
		<span class="row-info">
			<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
		</span>
		<span class="time-posted"><img src="{$BASE_URL}_templates/{$THEME}/img/clock.gif" alt="" /> {$job.created_on}</span>			
	</div>
{/foreach}
<br/>
{$pages}
{/if}