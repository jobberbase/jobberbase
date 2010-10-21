{include file="header.tpl"}
		
		<div id="content">
			<strong><a href="{$back_link}" title="home">&laquo; go back</a></strong><br />
			
			<div id="job-applicants">
				<h3 class="generic">{$applicants|@count} applicants{if $applicants|@count > 0}, latest on top{/if}</h3><br />

				<ul class="applicants-list">  
					{foreach item=applicant from=$applicants name=cvs} 
					    <li style="{if $smarty.foreach.cvs.index % 2}background-color: #ECF2F4;{/if}"> 
					        <span class="applicant-name">{$applicant.name}</span><br /><a href="mailto:{$applicant.email}">{$applicant.email}</a>
					        <div style="font-size: 11px;">
					            applied 
								 on <strong>{$applicant.created_on}</strong>
					        </div>
							{if $applicant.cv_path != ''}
					            <div><br /><strong><a href="{$cv_path}{$applicant.cv_path}">Download resume &rarr;</a></strong></div>
					        {/if}
					    </li>
					{/foreach}
				</ul>
			</div>
			<div id="job-content">
				{include file="job-details.tpl"}
			
				<div id="job-bottom">
					<div id="number-views">
						Published at <strong>{$job.created_on}</strong><br />
						Viewed: <strong>{$job.views_count}</strong> times
					</div>
					<div class="clear"></div>
				</div><!-- #job-bottom -->
			</div>
		</div><!-- /content -->

{include file="footer.tpl"}