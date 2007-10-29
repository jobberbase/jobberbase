{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<div class="steps">
				<div id="step-1">
					Step 1: Write
				</div>
				<div id="step-2">
					Step 2: Verify
				</div>
				<div id="step-3" class="step-active">
					Step 3: Confirm
				</div>
				<div class="clear"></div>
			</div>
			<br />
			{if $smarty.session.later_edit}
			<div class="posted-ok">
				Your job ad was edited successfully: <a href="{$job_url}">{$job_url}</a>
				{php}
					unset($_SESSION['later_edit']);
					unset($_SESSION['referer']);
				{/php}
			</div>
			<br />
			<p>
				<a href="{$BASE_URL}">&laquo; back to homepage</a>
			</p>
			{else}
				{if $first_time_post == 0}
				<div class="posted-ok">
					<strong>Congratulations, your job ad was published</strong> and
					is available at <a href="{$job_url}">{$job_url}</a>.
				</div>
				<h4>Edit or deactivate your ad</h4>
				<p>
					If you need to edit or deactivate this ad, use the following links:
				</p>
				<ul>	
					<li><a href="{$BASE_URL}post/{$CURRENT_ID.id}/{$auth}/" title="Edit ad">&raquo; Edit ad</a></li>
					<li><a href="{$BASE_URL}deactivate/{$CURRENT_ID.id}/{$auth}/" title="Deactivate ad">&raquo; Deactivate ad</a></li>
				</ul>
				{else}
				<div class="posted-pending">
					Your job was posted, but since this is the first time you post with this e-mail address,
					we need to manually verify it.<br />
					Thank you for your patience, as the ad should be published ASAP. We'll send you an e-mail when that happens. <br /><br />

					From now on, every ad you post with this e-mail address will instantly be published.<br />
				</div>
				<br />
				<p>
					<a href="{$BASE_URL}">&laquo; back to homepage</a>
				</p>
				{/if}
			{/if}
		</div><!-- /content -->

{include file="footer.tpl"}