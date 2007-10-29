{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading">We really appreciate feedback!</h3>
			<p>
				E-mail us at <strong>hello [at] domain [dot] com</strong> or use the form below:
			</p>
			{if $smarty.session.contact_msg_sent AND $smarty.session.contact_msg_sent eq 1}
			<div class="apply-status-ok">
				Thank you for your message! :)
			</div>
			{/if}
			{if $smarty.session.contact_msg_sent AND $smarty.session.contact_msg_sent eq -1}
			<div class="validation-failure">
				Your message could not be sent. Try again?
			</div>
			{/if}
			<div id="contact-form">
				<div id="contact-form-contents">
					<form id="apply-online" method="post" action="{$BASE_URL}contact-msg/">
						<label for="apply_name">Your name:</label><br />
						<input {if $smarty.session.contact_errors.contact_name}class="error"{/if} type="text" name="contact_name" id="contact_name" maxlength="50" size="30" value="{$smarty.session.contact_fields.contact_name}" />
						<span class="validation-error">{if $smarty.session.contact_errors.contact_name}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
						<br /><br />
						<label for="apply_email">Your e-mail:</label><br />
						<input {if $smarty.session.contact_errors.contact_email}class="error"{/if} type="text" name="contact_email" id="contact_email" maxlength="50" size="30" value="{$smarty.session.contact_fields.contact_email}" />
						<span class="validation-error">{if $smarty.session.contact_errors.contact_email}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
						<br /><br />
						<label for="apply_msg">Message:</label><br />
						<textarea {if $smarty.session.contact_errors.contact_msg}class="error"{/if} name="contact_msg" id="contact_msg" cols="50" rows="8">{$smarty.session.contact_fields.contact_msg}</textarea>
						<span class="validation-error">{if $smarty.session.contact_errors.contact_msg}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
						<br /><br />
						<input type="submit" name="submit" id="submit" value="Send message" />
					</form>
				</div><!-- #contact-form-contents -->
			</div><!-- #contact-form -->
		</div><!-- /content -->
		{literal}
		<script type="text/javascript">
	 		$(document).ready(function()
			{
				$("#apply-online").validate({
					rules: {
						contact_name: { required: true },
						contact_email: { required: true },
						contact_msg: { required: true }
					},
					messages: {
						contact_name: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
						contact_email: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
						contact_msg: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />'
					}
				});
			});
		</script>
		{/literal}

{include file="footer.tpl"}