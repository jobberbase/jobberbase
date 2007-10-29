{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<div class="steps">
				<div id="step-1">
					Step 1: Write
				</div>
				<div id="step-2" class="step-active">
					Step 2: Verify
				</div>
				<div id="step-3">
					Step 3: Confirm
				</div>
				<div class="clear"></div>
			</div>
			
			{include file="job-details.tpl"}
			
			<form name="publish_form" id="publish_form" method="post" action="{$BASE_URL}publish/{$job.id}/">
				<fieldset>
					<div class="right">
						<div class="suggestion">If you changed your mind, you may
						<a href="{$BASE_URL}deactivate/{$job.id}/" title="Anulează anuntul">cancel posting this ad</a></div>
					</div>
					{if $smarty.session.later_edit}
					<input type="submit" name="submit" id="submit" value="Save changes" />
					{else}
					<input type="submit" name="submit" id="submit" value="Publish this ad" />
					{/if}
					&nbsp;or&nbsp;
					<a href="{$BASE_URL}post/{$job.id}/" title="Edit this ad">Edit it</a>
				</fieldset>
			</form>
		</div><!-- /content -->

{include file="footer.tpl"}