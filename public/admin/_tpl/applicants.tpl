{include file="header.tpl"} 

<div id="content"> 
    <h2 id="applicants">{if $applicants_count > 0}{$applicants_count} applicants, latest on top{else}No applicants, yet{/if}</h3> 
    <div id="accordion-list"> 

		<ul class="applicants-list">  
			{foreach item=applicant from=$applicants name=cvs} 
			    <li style="{if $smarty.foreach.cvs.index % 2}background-color: #ECF2F4;{/if}"> 
					{if $applicant.cv_path != ''}
			            <div style="float:right"><strong><a href="{$cv_path}{$applicant.cv_path}">Download resume &rarr;</a></strong></div>
			        {/if}
			        <span class="applicant-name">{$applicant.name}</span> &mdash; <a href="mailto:{$applicant.email}">{$applicant.email}</a>
			        <div style="font-size: 11px;">
			            applied 
						{if $applicant.title}to <a href="{$BASE_URL_ADMIN}job/{$applicant.job_id}/">{$applicant.title}</a>{/if}
						{if $applicant.company}at {$applicant.company}{/if}
						 on <strong>{$applicant.created_on}</strong>
			        </div>
			    </li>
			{/foreach}
		</ul>

    </div>
</div><!-- #content -->

{include file="footer.tpl"}

