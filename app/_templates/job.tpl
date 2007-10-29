{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			{include file="job-details.tpl"}
			{if $CURRENT_PAGE == 'job'}
			<div id="job-bottom">
				<div id="job-post-utils">
					<a href="{$back_link}" title="home">&laquo; go back</a><br />
					Is this job ad fake? <a href="#" onclick="Jobber.ReportSpam('{$BASE_URL}report-spam/', {$job.id}); return false;" title="report fake ad">Report it!</a>
					&nbsp;&nbsp;<span id="report-spam-response"></span><br />
					<a href="#" onclick="Jobber.SendToFriend.showHide(); return false;" title="Recommend to a friend">Recommend to a friend</a>
				</div><!-- #job-post-utils -->
				<div id="number-views">
					Published at <strong>{$job.created_on}</strong><br />
					Viewed: <strong>{$job.views_count}</strong> times
				</div><!-- #number-views -->
				<div class="clear"></div>
			</div><!-- #job-bottom -->
			<div id="send-to-friend" style="display: none;">
				<form id="frm-send-to-friend" method="post" action="{$BASE_URL}send-to-friend/">
					<table>
						<tr>
							<td class="send-to-friend-address-label"><label for="friend_email">Friend's e-mail:</label></td>
							<td><input type="text" name="friend_email" id="friend_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td><label for="my_email">Your e-mail:</label></td>
							<td><input type="text" name="my_email" id="my_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" id="submit" value="Send" />
								&nbsp;&nbsp;<span id="send-to-friend-response"></span>
							</td>
						</tr>
					</table>
				</form>
			</div><!-- #send-to-friend -->
			{literal}
			<script type="text/javascript">
				$(document).ready(function()
				{
					Jobber.SendToFriend.sendMsg();
				});
			</script>
			{/literal}
			{/if}
		</div><!-- /content -->

{include file="footer.tpl"}