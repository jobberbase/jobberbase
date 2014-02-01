{include file="header.tpl"}
		
<div id="content">
	<div id="job-listings"></div>
	
	<h2>
		<img src="{$BASE_URL}_tpl/{$THEME}/img/icon-{$job.type_var_name}.png" alt="{$job.type_name}" /> {$job.title} 
	</h2>
	<p>
		<span class="fading">{$translations.jobs.preposition_at}</span>
		{if $job.url && $job.url != 'http://'}
		<a href="{$job.url}">{$job.company}</a>
		{else}
		<strong>{$job.company}</strong>
		{/if}
		{if $job.is_location_anywhere}
		<strong>({$translations.jobs.location_anywhere})</strong>
		{else}
		<span class="fading">{$translations.homepage.in}</span> <strong>{$job.location}</strong>
		{/if}
	</p>
	<div id="job-description">
	{$job.description}
	</div>
	
	<br />
	
	<h2>{$count_jobs} {$translations.applications.title}</h2>
	{if count($applicants) > 0} 
	<!-- List of applicants -->
	<table id="apply" class="apply" cellspacing="0">
	<tr class="title">
		<td><strong>{$translations.applications.name}</strong></td>
		<td><strong>{$translations.applications.email}</strong></td>
		<td><strong>{$translations.applications.date}</strong></td>
		<td><strong>{$translations.applications.cv}</strong></td>
	</tr>
	{foreach item=applicant from=$applicants}
		<tr class="row">
			<td>{$applicant.name}</td>
			<td><a href="mailto:{$applicant.email}">{$applicant.email}</a></td>
			<td>{$applicant.created_on|date_format}</td>
			<td>{if $applicant.cv_path != ''}<a href="{$cv_path}{$applicant.cv_path}" title="{$translations.applications.download_cv}">{$translations.applications.download}</a>{/if}</td>
		</tr>
		<tr class="row-alt">
			<td colspan="4"><p>{$applicant.message}</p></td>
		</tr>
	{/foreach}
	</table>
	<br/>
	{$pages}
	{else}
		<p>{$translations.applications.no_applicants}</p>
	{/if}
	
</div><!-- /content -->

{include file="footer.tpl"}
