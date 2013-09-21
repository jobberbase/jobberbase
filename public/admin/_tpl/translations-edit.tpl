{include file="header.tpl"}

	<div id="content">
		<h2 id="settings">
			Edit Translations for:&nbsp;
			<select id="translations-lang">
				{foreach item=lang from=$languages}
				<option value="{$lang.code}"{if $lang.code == $current_lang} selected="selected"{/if}>{$lang.name}</option>
				{/foreach}
			</select>
		</h2>
		
		<a href="#" class="new-item" id="new-translation-section-trigger">Add a new section</a>
		<br />
		
		<div id="new-translation-section">
			<form>
				<strong>Name</strong><br />
				<input type="text" id="new-section-item" size="40" />
				<button id="add-section-trigger" rel="{$current_lang_id}">Create</button>
				or <a href="#" id="cancel-add-section-trigger">Cancel</a>
			</form>
		</div>
		
		<div class="list translations">
			{foreach item=tr_section from=$translations_raw}
				<div class="row {cycle values='odd,even'}">
					<div style="float:right;padding:10px"><a href="#" title="Delete this section" class="translation-section-delete" rel="{$tr_section.id}"><img src="{$BASE_URL_ADMIN}_tpl/img/bin.png" alt="Delete" /></a></div>
					<h4 class="genericBig"><span>Section:</span> {$tr_section.section}</h4>
					<a href="#" class="new-item new-translation-trigger">Add a new item</a>
					
					<div class="new-translation" id="new-translation-{$tr_section.id}">
						<form>
							<table>
								<tr><th>Item</th><th>Value</th><th>&nbsp;</th></tr>
								<tr>
									<td><input type="text" class="new-translation-item" size="20" /></td>
									<td><input type="text" class="new-translation-value" size="70" /></td>
									<td><button class="new-translation-add-trigger" rel="{$tr_section.id}">Add</button> or <a href="#" class="new-transaction-cancel-trigger">Cancel</a></td>
								</tr>
							</table>
						</form>
					</div>
					<br />
					
					<table width="100%" id="translations_{$tr_section.id}" class="translation-items">
					{foreach item=tr_item from=$tr_section.items}
						<tr>
							<td width="230" valign="top"><strong>{$tr_item.item}:</strong></td>
							<td>
								{if $tr_item.field_type == 'textarea'}
								<textarea cols="70" rows="10" rel="{$tr_item.id}">{$tr_item.value|htmlspecialchars}</textarea>
								{else}
								<input type="text" value="{$tr_item.value|htmlspecialchars}" size="70" rel="{$tr_item.id}" />
								{/if}
								<a href="#" title="Delete this item" class="translation-item-delete" rel="{$tr_item.id}"><img src="{$BASE_URL_ADMIN}_tpl/img/bin.png" alt="Delete" /></a>
							</td>
						</tr>
					{/foreach}
					</table>
				</div>
			{/foreach}
		</div>
	</div>
		
{include file="footer.tpl"}
