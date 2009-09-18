{include file="header.tpl"}
		
				<div id="sidebar">
					<div class="sidebar_page_edit">
						<h3>Links</h3>
						<p>Make a selection in the editor or select an existing link and click on one of the links bellow.</p>
						<dl id="links_list">
							<dt><strong>Internal</strong></dt>
							<dd><a href="#" rel="{$BASE_URL}post/">Post a job</a></dd>
							<dd><a href="#" rel="{$BASE_URL}rss/">RSS Feed</a></dd>
							<dd><a href="#" rel="{$BASE_URL}{$URL_COMPANIES}/">Companies</a></dd>
							<dt><strong>Categories</strong></dt>
							{section name=tmp loop=$categories}
							<dd><a href="#" rel="{$BASE_URL}{$URL_JOBS}/{$categories[tmp].var_name}/">{$categories[tmp].name}</a></dd>
							{/section}
							<dt><strong>Pages</strong></dt>
							{foreach from=$pages item=page}
							<dd><a href="#" rel="{$BASE_URL}{$URL_JOBS}/{$page.url}/">{$page.title}</a></dd>
							{/foreach}
						</dl>
					</div>
				</div>
		<div id="content">
				<h2>Pages</h2>
				{if $current_page}
				<h3>Editing page &quot;{$current_page.title}&quot;</h3>
				{else}
				<h3>Add new page</h3>
				{/if}
				<form id="publish_form" action="{$smarty.server.REQUEST_URI}" method="post">
					<p>
						<button type="submit" class="submit_button">{if $current_page}Modify page{else}Add page{/if}</button>
					</p>
					<fieldset>
						<legend>SEO</legend>
						<table cellspacing="2" cellpadding="2" border="0">
							<tr>
								<td colspan="2"><label for="page_url">URL</label></td>
							</tr>
							<tr>
								<td colspan="2">
									{if $errors.page_url}<em class="form_error">{$errors.page_url}</em>{/if}
									<input type="text" name="page_url" id="page_url" class="text_field" value="{$defaults.page_url}" />
								</td>
							</tr>
							<tr>
								<td colspan="2"><label for="page_page_title">Page title</label></td>
							</tr>
							<tr>
								<td colspan="2">
									{if $errors.page_page_title}<em class="form_error">{$errors.page_page_title}</em>{/if}
									<input type="text" name="page_page_title" id="page_page_title" class="text_field" value="{$defaults.page_page_title}" />
								</td>
							</tr>
							<tr>
								<td width="50%"><label for="page_keywords">Keywords</label></td>
								<td width="50%"><label for="page_description">Description</label></td>
							</tr>
							<tr>
								<td width="50%"><textarea id="page_keywords" name="page_keywords" class="textarea_field_small" rows="6">{$defaults.page_keywords}</textarea></td>
								<td width="50%"><textarea id="page_description" name="page_description" class="textarea_field_small" rows="6">{$defaults.page_description}</textarea></td>
							</tr>
						</table>
					</fieldset>
					<p>
						<button type="submit" class="submit_button">{if $current_page}Modify page{else}Add page{/if}</button>
					</p>
					<fieldset>
						<legend>Content</legend>
						<table cellspacing="2" cellpadding="2" border="0">
							<tr>
								<td colspan="2"><label for="page_title">Title</label></td>
							</tr>
							<tr>
								<td colspan="2">
									{if $errors.page_title}<em class="form_error">{$errors.page_title}</em>{/if}
									<input type="text" name="page_title" id="page_title" class="text_field" value="{$defaults.page_title}" />
								</td>
							</tr>
							<tr>
								<td colspan="2"><label for="page_content">Content</label></td>
							</tr>
							<tr>
								<td colspan="2"><textarea id="page_content" name="page_content" class="textarea_field mceEditor" rows="40">{$defaults.page_content}</textarea></td>
							</tr>
							<tr>
								<td colspan="2"><label><input type="checkbox" id="page_has_form" name="page_has_form" value="1"{if $defaults.page_has_form == '1'} checked="checked"{/if} /> Has contact form?</label></td>
							</tr>
							<tr{if $defaults.page_has_form != '1'} class="hidden"{/if}>
								<td colspan="2"><label for="page_form_message">Form message</label></td>
							</tr>
							<tr{if $defaults.page_has_form != '1'} class="hidden"{/if}>
								<td colspan="2"><textarea id="page_form_message" name="page_form_message" class="textarea_field mceEditor" rows="20">{$defaults.page_form_message}</textarea></td>
							</tr>
						</table>
					</fieldset>
					<p>
						<button type="submit" class="submit_button">{if $current_page}Modify page{else}Add page{/if}</button>
					</p>
				</form>
		</div><!-- #content -->
{literal}
	<script type="text/javascript">
		jobberBase.editor();
	</script>
{/literal}
{include file="footer.tpl"}