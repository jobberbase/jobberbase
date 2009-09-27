{include file="header.tpl"}
	<form id="city_form" action="{$BASE_URL_ADMIN}cities/{if $action eq 'add'}add/{else}edit/{/if}" method="post">
		<fieldset>
			<legend>{if $action eq 'add'}New city{else}Edit city{/if}</legend>
			{if $errors.name}<em class="form_error">{$errors.name}</em>{/if}
			<label><span>Name:</span><input type="text" size="60" name="name" value="{$city.name}" /></label>
			{if $errors.asciiName}<em class="form_error">{$errors.asciiName}</em>{/if}
			<label><span>Ascii name:</span><input type="text" size="60" name="ascii_name" value="{$city.ascii_name}"/></label>
			{if $action eq 'edit'}
				<input type="hidden" name="id" value="{$city.id}" />
			{/if}
		</fieldset>
		<p>
			<button type="submit" class="submit_button">Save</button>
		</p>
	</form>
{include file="footer.tpl"}