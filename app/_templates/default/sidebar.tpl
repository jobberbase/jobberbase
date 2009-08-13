			{if $CURRENT_PAGE != ''}
			<a href="{$BASE_URL}" title="{$translations.header.title}">&laquo; {$translations.header.home}</a><br />
			{/if}
			
			{if $smarty.session.last_viewed_jobs}
			<h4>{$translations.header.seen_recently}</h4>
			<ul>
				{section name=last loop=$smarty.session.last_viewed_jobs}
				<li><a href="{$smarty.session.last_viewed_jobs[last].url}">&raquo; {$smarty.session.last_viewed_jobs[last].title}</a></li>
				{/section}
			</ul>
			{/if}
			
			{if $CURRENT_PAGE == ''}
			<br />
			<div id="stats">
				<strong>{$jobs_count_all} total jobs</strong>
				<br />
				{if $smarty.const.SIDEBAR_SHOW_WHAT == 'categories'}
					{foreach item=job from=$jobs_count_all_categs}
					<strong>{$job.categ_count}</strong> for <a href="{$BASE_URL}{$URL_JOBS}/{$job.categ_varname}/">{$job.categ_name}</a><br />
					{/foreach}
				{else}
					{foreach item=job from=$jobs_count_per_city}
					<strong>{$job.jobs_in_city}</strong> {$translations.jobscity.sidebar_jobs_in} <a href="{$BASE_URL}{$URL_JOBS_IN_CITY}/{$job.city_ascii_name}/">{$job.city_name}</a><br />
					{/foreach}
				{/if}
			</div><!-- #stats -->
			{/if}