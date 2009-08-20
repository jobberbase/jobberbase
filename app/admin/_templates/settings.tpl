{include file="header.tpl"}
		<div id="content">
			{if $settings_categories}
				<h3 class="page-heading">Settings Overview</h3>
				{section name=tmp loop=$settings_categories}
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}settings/{$settings_categories[tmp].var_name}'>{$settings_categories[tmp].name} &raquo;</a></span>
						<span class="category_description">{if $settings_categories[tmp].description != ''}<br />{$settings_categories[tmp].description}{/if}</span>
					</div>
				{/section}
			{/if}
			{if $settings_form != ''}
				{if $category_name !=  ''}<h3 class="page-heading">{$category_name}<span class="back_to_overview"><a href='{$BASE_URL_ADMIN}settings' title='Back to overview'>&laquo; Back to overview</a></span></h3>{/if}
				<form id="publish_form" method="post" action="{$BASE_URL_ADMIN}settings/{$CURRENT_ID}">
					{if $errors != ''}
						<fieldset class="error">
							<legend>Error Messages</legend>
							<ul>
								{foreach from=$errors item=error}
									{section name=tmp2 loop=$error}								
										<li>{$error[tmp2]}</li>
									{/section}								
								{/foreach}
								
							</ul>
						</fieldset>
					{/if}
					<fieldset>
						<legend>Settings</legend>
						<table border="0" cellspacing="2" cellpadding="2">
							{foreach from=$settings_form item=setting}
								{assign var=setting_name value=$setting.setting_name}
								{assign var=setting_title value=$setting.setting_title}
								{assign var=setting_description value=$setting.setting_description}
								{assign var=setting_value value=$setting.setting_value}
								{assign var=field_type value=$setting.field_type}
								<tr {cycle values='class="input_alt",'}>
								<td valign='top' class='settingsform_title'>{$setting_title}:</td>
								<td valign='top' class='settingsform_input'>
									{if $field_type.0 == 'text_area'}
										<textarea class="settingsform_text_area{if $errors.$setting_name != ''} error{/if}" name="{$setting_name}">{$setting_value}</textarea>
									{elseif $field_type.0 == 'radiobutton'}
										{section name=tmp2 loop=$field_type start=1}
											<input type="radio" name="{$setting_name}" value="{$field_type[tmp2]}" {if $field_type[tmp2] == $setting_value}checked="checked"{/if} />{$field_type[tmp2]}
										{/section}
									{elseif $field_type.0 == 'select'}
										<select {if $errors.$setting_name != ''}class="error"{/if} name="{$setting_name}">
										{section name=tmp2 loop=$field_type start=1}
											<option value="{$field_type[tmp2]}" {if $field_type[tmp2] == $setting_value}selected="selected"{/if}>{$field_type[tmp2]}</option>
										{/section}
										</select>
									{elseif $field_type.0 == 'checkbox'}
										<input {if $errors.$setting_name != ''}class="error"{/if} type="checkbox" name="{$setting_name}[]" value="_hidden" style="display:none;" checked="checked"/>
										{section name=tmp2 loop=$field_type start=1}
											<input type="checkbox" name="{$setting_name}[]" value="{$field_type[tmp2]}" {if in_array($field_type[tmp2], $setting_value)}checked="checked"{/if} />{$field_type[tmp2]}<br />
										{/section}
									{else}
										<input class="settingsform_text_field{if $errors.$setting_name != ''} error{/if}" type="text" 	name="{$setting_name}" value="{$setting_value}"/>
									{/if}
									{if $errors.$setting_name != ''}<span class="validation-error"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" /></span>{/if}
								</td>
								<td class="settingsform_description">{$setting_description}</td>
								</tr>
								</label>
							{/foreach}
						</table>
					</fieldset>
					<fieldset>
						<input type="hidden" name="action" value="update_settings" />
						<input type="submit" id="save" value="Save" /> or <a href="{$BASE_URL_ADMIN}settings">cancel</a>
					</fieldset>
				</form>
			{/if}
		</div>
		
{include file="footer.tpl"}