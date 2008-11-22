			<fieldset id="preview_job_fieldset">
			<legend>Preview</legend>
			<div id="job-details">
				{if $job.days_old > 40}
				<div id="old-ad">
					This job ad has been posted over 40 days ago...
				</div>
				{/if}
				<h2>
					{if $job.type_id == $smarty.const.JOBTYPE_FULLTIME}
					<img src="{$BASE_URL}img/icon-fulltime.png" alt="full time" />
					{elseif $job.type_id == $smarty.const.JOBTYPE_PARTTIME}
					<img src="{$BASE_URL}img/icon-parttime.png" alt="part time" />
					{elseif $job.type_id == $smarty.const.JOBTYPE_FREELANCE}
					<img src="{$BASE_URL}img/icon-freelance.png" alt="freelance" />
					{/if} {$job.title} 
				</h2>
				<p>
					<span class="fading">at</span>
					{if $job.url && $job.url != 'http://'}
					<a href="{$job.url}">{$job.company}</a>
					{else}
					<strong>{$job.company}</strong>
					{/if}
					{if $job.location == 'Anywhere'}
					<strong>({$job.location})</strong>
					{else}
					<span class="fading">in</span> <strong>{$job.location}</strong>
					{/if}
				</p>
				<div id="job-description">
				{$job.textiledDescription}
				</div><br />
				
			</div><!-- #job-details -->
			</fieldset>
