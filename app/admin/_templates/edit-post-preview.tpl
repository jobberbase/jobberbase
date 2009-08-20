			<fieldset id="preview_job_fieldset">
			<legend>Preview</legend>
			<div id="job-details">
				{if $job.days_old > 40}
				<div id="old-ad">
					This job ad has been posted over 40 days ago...
				</div>
				{/if}
				<h2>
					<img src="{$BASE_URL_ADMIN}img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" /> {$job.title} 
				</h2>
				<p>
					<span class="fading">at</span>
					{if $job.url && $job.url != 'http://'}
					<a href="{$job.url}">{$job.company}</a>
					{else}
					<strong>{$job.company}</strong>
					{/if}
					{if $job.is_location_anywhere}
					<strong>({$translations.jobs.location_anywhere})</strong>
					{else}
					<span class="fading">in</span> <strong>{$job.location}</strong>
					{/if}
				</p>
				<div id="job-description">
				{$job.textiledDescription}
				</div><br />
				
			</div><!-- #job-details -->
			</fieldset>
