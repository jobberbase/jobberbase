{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings">
				{if $jobs}
				<div id="sort-by-type">
				{$translations.category.display_only}&nbsp; 
					{section name=tmp loop=$types}
						<a href="{$BASE_URL}{$URL_JOBS}/{$current_category}/{$types[tmp].var_name}/" title="{$current_category} {$types[tmp].name}"><img src="{$BASE_URL}_tpl/{$THEME}/img/icon-{$types[tmp].var_name}.png" alt="{$types[tmp].name}" /></a>
					{/section}
				</div><!-- #sort-by-type -->
				{/if}
				<h2>
					{$translations.category.jobs_for} {$current_category_name}
				</h2>
				{include file="posts-loop.tpl"}
			</div><!-- #job-listings -->
			<h2>{$translations.subscriptions.subscribe_message}</h2>
			<div id="subscribe">
				<form id="frm-subscribe" method="post" action="{$BASE_URL}subscribe/">
					<table>
						<tr>
							<td class="subscribe-address-label"><label for="subscribe_email">{$translations.subscriptions.subscribe_email_label}:</label></td>
							<td><input type="text" name="email" id="subscribe_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="category" value="{$current_category_id}">
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
