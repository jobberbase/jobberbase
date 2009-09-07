{include file="header.tpl"}
<form id="publish_form" method="post" action="{$BASE_URL_ADMIN}">
<fieldset>
<legend>Login</legend>
<table border="0" cellspacing="2" cellpadding="2">
	{if $errors.incorrect}<tr><td colspan="3"><span class="validation-error"><img
			src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />{$errors.incorrect}</span></td>
		</tr>
	{/if}
	<tr>
		<td class="publish-label">Username:</td>
		<td><input {if $errors.username}class="error" {/if} tabindex="1"
			type="text" name="username" id="username" size="40"
			value="{$smarty.post.username}" />
		<span class="validation-error">{if $errors.username}<img
			src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />{/if}</span></td>
	</tr>
	<tr>
		<td class="publish-label">Password:</td>
		<td><input {if $errors.password}class="error" {/if} tabindex="2"
			type="password" name="password" id="password" size="40"
			value="" />
		<span class="validation-error">{if $errors.password}<img
			src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />{/if}</span></td>
	</tr>
	
	
</table>
</fieldset>
<fieldset><input type="submit" name="submit" id="submit"
	value="Login" /></fieldset>
	<fieldset class="hidden">
		<input type="hidden" name="action" value="login" />
		
	</fieldset>
</form>
{include file="footer.tpl"}
