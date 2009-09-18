{include file="header.tpl"}
		<div id="content">
				<h3 class="page-heading">Change your password</h3>
				
				<form id="publish_form" action="{$smarty.server.REQUEST_URI}" method="post">
					<fieldset>
						<table cellspacing="2" cellpadding="2" border="0">
							{if $error}
							<tr>
								<td colspan="2">
									<em class="form_error">{$error}</em>
								</td>
							</tr>
							{/if}
							<tr>
								<td>New password:</td>
								<td><input type="password" name="new_password" size="30" /></td>
							</tr>
							<tr>
								<td>Verify password:</td>
								<td><input type="password" name="verify_password" size="30" /></td>
							</tr>
						</table>
					</fieldset>
					<p>
						<button type="submit" class="submit_button">Change password</button>
					</p>
				</form>
		</div><!-- #content -->

{include file="footer.tpl"}