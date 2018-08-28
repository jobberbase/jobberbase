{include file="header.tpl"}
{if $ENABLE_RECAPTCHA}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{/if}
{if $errors.incorrect}
		<div class="fail">{$errors.incorrect}</div>
	{/if}

<div id="container_login">
	<div class="block">
	<form id="login" method="post" action="{$BASE_URL_ADMIN}">
		<h3>Please login first</h3>
		<div class="block_inner">
			<div class="group{if $errors.username} error{/if}">
				<input type="text" name="username" id="username" size="20" value="{$smarty.post.username}" />
				{if $errors.username}<div class="suggestion">{$errors.username}</div>{/if}
			</div>
			<div class="group{if $errors.password} error{/if}">
				<input type="password" name="password" id="password" size="20"	value="" />
				{if $errors.password}<div class="suggestion">{$errors.password}</div>{/if}
			</div>
			{if $ENABLE_RECAPTCHA}
				<div class="g-recaptcha" data-sitekey="{{$smarty.const.CAPTCHA_PUBLIC_KEY}}"></div>
				<span class="validation-error">{if $errors.captcha}
				<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" /> {$errors.captcha}{/if}</span>
				<br />
			{/if}
			<div class="group_submit">
				<button type="submit" name="submit" id="submit"><span>Login</span></button>
				<input type="hidden" name="action" value="login" />
			</div>
		</div>
	</form>
</div>
{include file="footer.tpl"}
