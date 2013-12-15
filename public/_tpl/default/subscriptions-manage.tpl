{include file="header.tpl"}

		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h2>
				{$translations.subscriptions.manage_title}
			</h2>
			{if $subscriptions_updated}
			<div class="subscriptions_updated">{$translations.subscriptions.updated_message}</div>
			{else}
				{if $page}
					<div class="subscribe-page-content">
					{$page.content}
					</div>
				{/if}
			{/if}
			<form id="manage_subscriptions_form" method="post" action="{$BASE_URL}subscriptions/">
				<table>
					<tr>
						<td colspan="2">
							<h3>{$translations.subscriptions.subscribe_categories_title}</h3>
							<ul>
								<li><label><strong><input type="checkbox" name="categories[]" value="0" {if $subscriptions_all_jobs_subscribed}checked="checked"{/if} /> {$translations.subscriptions.all_jobs}</strong></label></li>
								{foreach item=category from=$subscriptions_categories}
								<li><label><input type="checkbox" name="categories[]" value="{$category.id}" {if $category.subscribed}checked="checked"{/if} /> {$category.name}</label></li>
								{/foreach}
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fld_email">{$translations.subscriptions.subscribe_email_label}:</label>
						</td>
						<td>
							<input type="text" id="fld_email" name="email" value="{$subscriptions_email}" readonly="readonly" />
							<input type="hidden" name="auth" value="{$subscriptions_auth}" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="fld_keywords">{$translations.subscriptions.keywords}</label>
						</td>
						<td>
							<input type="text" id="fld_keywords" name="keywords" value="{$subscriptions_keywords}" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="submit" name="save_settings" value="1">{$translations.subscriptions.save_settings}</button>
							<button type="submit" name="delete_subscriber" value="1">{$translations.subscriptions.remove_subscriber}</button>
						</td>
					</tr>
				</table>
			</form>

{include file="footer.tpl"}
