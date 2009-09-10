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
								{assign var=name value=$setting.name}
								{assign var=title value=$setting.title}
								{assign var=description value=$setting.description}
								{assign var=value value=$setting.value}
								{assign var=data_type value=$setting.data_type}
								{assign var=input_type value=$setting.input_type}
								{assign var=input_options value=$setting.input_options}
								<tr {cycle values='class="input_alt",'}>
								<td valign='top' class='settingsform_title'>{$title}:</td>
								<td valign='top' class='settingsform_input'>
									{if $input_type == 'text_area'}
										<textarea class="settingsform_text_area{if $errors.$name != ''} error{/if}" name="{$name}">{$value|escape}</textarea>
									{elseif $input_type == 'radiobutton'}
										{if $data_type == 'boolean'}
											<input type="radio" name="{$name}" value="0" {if $value == 0}checked="checked"{/if} />{if $input_options[0]}{$input_options[0]}{else}0{/if}
											<input type="radio" name="{$name}" value="1" {if $value == 1}checked="checked"{/if} />{if $input_options[1]}{$input_options[1]}{else}1{/if}
										{else}
											{section name=tmp2 loop=$input_options}
												<input type="radio" name="{$name}" value="{$input_options[tmp2]}" {if $input_options[tmp2] == $value}checked="checked"{/if} />{$input_options[tmp2]}
											{/section}
										{/if}
									{elseif $input_type == 'select'}
										<select {if $errors.$name != ''}class="error"{/if} name="{$name}">
										{section name=tmp2 loop=$input_options}
											<option value="{$input_options[tmp2]}" {if $input_options[tmp2] == $value}selected="selected"{/if}>{$input_options[tmp2]}</option>
										{/section}
										</select>
									{elseif $input_type == 'checkbox'}
										<input {if $errors.$name != ''}class="error"{/if} type="checkbox" name="{$name}[]" value="_hidden" style="display:none;" checked="checked"/>
										{section name=tmp2 loop=$input_options}
											<input type="checkbox" name="{$name}[]" value="{$input_options[tmp2]}" {if in_array($input_options[tmp2], $value)}checked="checked"{/if} />{$input_options[tmp2]}<br />
										{/section}
									{else}
										<input class="settingsform_text_field{if $errors.$name != ''} error{/if}" type="text" name="{$name}" value="{$value|escape}"/>
									{/if}
									{if $errors.$name != ''}<span class="validation-error"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" /></span>{/if}
								</td>
								<td class="settingsform_description">{$description}</td>
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