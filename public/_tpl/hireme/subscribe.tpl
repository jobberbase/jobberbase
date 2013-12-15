{include file="header.tpl"}

		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h2>
				{$translations.subscriptions.subscribe_title}
			</h2>
			{if $page}
				<div class="subscribe-page-content">
				{$page.content}
				</div>
			{/if}
			<div id="subscribe">
				<form id="frm-subscribe" method="post" action="{$BASE_URL}subscribe/">
					<table>
						<tr>
							<td class="subscribe-address-label"><label for="subscribe_email">{$translations.subscriptions.subscribe_email_label}:</label></td>
							<td><input type="text" name="email" id="subscribe_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="category" value="0">
								<input type="submit" name="submit" id="submit" value="{$translations.subscriptions.subscribe_submit}" />
								&nbsp;&nbsp;<span id="subscribe-response"></span>
							</td>
						</tr>
					</table>
				</form>
			</div><!-- #subscribe -->
		</div><!-- #content -->
		<script type="text/javascript">
			{literal}
			$(document).ready(function()
			{
				Jobber.Subscribe.init();
			});
			{/literal}
		</script>

{include file="footer.tpl"}
