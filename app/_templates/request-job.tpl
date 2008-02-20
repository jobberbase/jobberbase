{include file="header.tpl"}

		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading">{$translations.idealjob.title_heading}</h3>
			<p>
				{$translations.idealjob.intro}
			</p>
			<br />
			{if $filter_error}
			<div class="validation-failure">
				<img src="{$BASE_URL}img/icon-delete.png" alt="" />
				{$filter_error}
			</div>
			{/if}
			{if $errors}
			<div class="validation-failure">
				<img src="{$BASE_URL}img/icon-delete.png" alt="" />
				{$translations.publish.form_error}
			</div>
			{/if}

			<form id="publish_form" method="post" action="{$BASE_URL}ideal-job/">
				<fieldset>
					<legend>{$translations.idealjob.title} <span class="validation-error">{if $errors.the_params}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span></legend>
					<div id="req-left">
						<strong>{$translations.idealjob.job_label}:</strong><br />
						{foreach item=param from=$req_params_tip}
						<div class="req-params-item">
							<input type="checkbox" name="req_params[]" value="{$param.id}" id="param_{$param.id}" />
							<label for="param_{$param.id}" class="request-label">{$param.value}</label>
						</div><br />
						{/foreach}
					</div><!-- #req-left -->
					<div id="req-middle">
						<strong>{$translations.idealjob.company_label}:</strong><br />
						{foreach item=param from=$req_params_company}
						<div class="req-params-item">
							<input type="checkbox" name="req_params[]" value="{$param.id}" id="param_{$param.id}" />
							<label for="param_{$param.id}" class="request-label">{$param.value}</label>
						</div><br />
						{/foreach}
					</div><!-- #req-middle -->
					<div id="req-right">
						<strong>{$translations.idealjob.know_label}:</strong><br />
						{foreach item=param from=$req_params_kh}
						<div class="req-params-item">
							<input type="checkbox" name="req_params[]" value="{$param.id}" id="param_{$param.id}" />
							<label for="param_{$param.id}" class="request-label">{$param.value}</label>
						</div><br />
						{/foreach}
					</div><!-- #req-right -->
					<div id="req-right2">
						<strong>{$translations.idealjob.experience_label}:</strong><br />
						{foreach item=param from=$req_params_level}
						<div class="req-params-item">
							<input type="checkbox" name="req_params[]" value="{$param.id}" id="param_{$param.id}" />
							<label for="param_{$param.id}" class="request-label">{$param.value}</label>
						</div><br />
						{/foreach}
					</div><!-- #req-right2 -->
					<div class="clear"></div>
				</fieldset>

				<fieldset>
					<legend>{$translations.idealjob.your_info}</legend>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td class="publish-label">{$translations.idealjob.name_label}:</td>
							<td><input {if $errors.name}class="error"{/if} type="text" name="name" id="name" size="40" value="{$smarty.post.name}" />
							<span class="validation-error">{if $errors.name}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>
							</td>
						</tr> 
						<tr>
							<td class="publish-label">{$translations.idealjob.email_label}:</td>
							<td>
								<input {if $errors.email}class="error"{/if} type="text" name="email" id="email" size="40" value="{$smarty.post.email}" />
								<span class="validation-error">{if $errors.email}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>
							</td>
						</tr>
					</table>
				</fieldset>
				<fieldset><input type="submit" name="submit" id="submit" value="{$translations.idealjob.submit}" /></fieldset>
				<fieldset class="hidden">
					<input type="hidden" name="action" value="publish" />
				</fieldset>
			</form>
		</div><!-- /content -->
		
		{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				if (BrowserDetect.browser != "Explorer")
				{
					$("#publish_form").validate({
						rules: {
							name: { required: true },
							email: { required: true }
						},
						messages: {
							name: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
							email: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />'
						}
					});	
				}
			});
		</script>
		{/literal}

{include file="footer.tpl"}