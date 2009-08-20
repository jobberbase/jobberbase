				{if $spotlight_jobs}
			    <h2>{$translations.homepage.spotlight_jobs}</h2>
			    <table id="job-posts4" class="job-posts4" cellspacing="0">
			    {foreach item=job from=$spotlight_jobs}
			        <tr>
			            <td>
			            	<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
			                <a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
			            </td>
			            <td class="spotlight-image"><img src="{$BASE_URL}_templates/{$THEME}/img/icon-spotlight.png" alt="" /></td>
			        </tr>
			    {/foreach}
			    </table>
			    {/if}
				{if $latest_jobs}
				<h2>{$translations.homepage.recent_jobs}</h2>
				<table id="job-posts" class="job-posts" cellspacing="0">
				{foreach item=job from=$latest_jobs}
					<tr {cycle values='class="alt",'}>
						<td>
							<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
							<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
						</td>
						<td class="time-posted"><img src="{$BASE_URL}_templates/{$THEME}/img/clock.gif" alt="" /> {$job.created_on}</td>
					</tr>
				{/foreach}
				</table>
				{/if}
				{if $most_applied_to_jobs}
				<br />
				<h3>{$translations.homepage.popular_jobs}</h3>
				<table id="job-posts3" class="job-posts" cellspacing="0">
				{foreach item=job from=$most_applied_to_jobs}
					<tr {cycle values='class="alt",'}>
						<td>
							<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" />
							<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}">{$job.title}</a> <span class="la">{$translations.homepage.at}</span> {$job.company}{if $job.is_location_anywhere}, {$translations.jobs.location_anywhere}{else} <span class="la">{$translations.homepage.in}</span> {$job.location}{/if}
						</td>
						<td class="time-posted"><strong>{$job.apps}</strong> {$translations.homepage.applicants}</td>
					</tr>
				{/foreach}
				</table>
				{/if}
				{if !$latest_jobs && !$most_applied_to_jobs}
				<br />
				<p>
					{$translations.homepage.no_jobs}.<br />
					<a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>?
				</p>
				{/if}