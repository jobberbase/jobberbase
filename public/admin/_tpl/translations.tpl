{include file="header.tpl"}

	<div id="content">
		<h2 id="settings">Translations</h2>
		<div class="list">
			<div class="row odd">
				<h4 class="bold mb05"><a href="#" id="trans-manage-langs">Manage languages</a></h4>
				<div>Add new languages, edit or delete existing ones.</div>
				
				<div id="translation-langs">
					<h4>Add a new language</h4>
					<form id="new-lang-frm" method="post" action="">
						<table>
							<tr><th>Name (e.g. English)</th><th>Code (e.g. en)</th><th>&nbsp;</th></tr>
							<tr>
								<td><input type="text" id="new-lang-name" /></td>
								<td><input type="text" id="new-lang-code" size="7" maxlength="2" /></td>
								<td><button id="add-lang-trigger">Add</button></td>
							</tr>
						</table>
					</form>
					
					<h4>Existing languages</h4>
					<table class="listing" cellspacing="0">
						<tr><th>Name</th><th>Code</th><th>&nbsp;</th></tr>
						{foreach item=lang from=$languages}
						<tr class="{$lang.code}">
							<td width="200">
								<span>{$lang.name}</span>
								<div class="lang-edit"><form><input type="text" class="new-lang-name" value="{$lang.name}" /></form></div>
							</td>
							<td width="100">
								<span>{$lang.code}</span>
								<div class="lang-edit"><form><input type="text" class="new-lang-code" value="{$lang.code}" size="7" maxlength="2" /></form></div>
							</td>
							<td align="right">
								<span><strong><a href="#" class="lang-edit-trigger" rel="{$lang.code}">Edit</a></strong> &bull; <a href="#" class="lang-delete-trigger" rel="{$lang.id}">Delete</a></span>
								<div class="lang-edit"><button class="lang-save-trigger" rel="{$lang.id}">Save</button> or <a href="#" class="lang-cancel-trigger" rel="{$lang.code}">Cancel</a></div>
							</td>
						</tr>
						{/foreach}
					</table>
				</div>
			</div>
			
			<div class="row even">
				<h4 class="bold mb05"><a href="{$BASE_URL_ADMIN}translations/edit/{$smarty.const.LANG_CODE}/">Edit translations</a></h4>
				<div>Manage translations (strings on the site + emails).</div>
			</div>
		</div>
	</div>
		
{include file="footer.tpl"}