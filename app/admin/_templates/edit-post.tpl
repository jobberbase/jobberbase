{include file="header.tpl"}

<h3 class="page-heading">{if $job.id == 0}Post job{else}Edit job{/if}</h3>

		{if $show_preview}
			{include file="edit-post-preview.tpl"}
		{/if}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<br />
			{if $filter_error}
			<div class="validation-failure">
				<img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />
				{$filter_error}
			</div>
			{/if}
			{if $errors}
			<div class="validation-failure">
				<img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />
				{$translations.publish.form_error}
			</div>
			{/if}

			<form id="publish_form" method="post" action="{$BASE_URL_ADMIN}edit-post/{if $job.id neq 0}{$job.id}/{/if}">
				<fieldset>
					<legend>Job Details</legend>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td colspan="2">
								{section name=tmp2 loop=$types}
								<input class="no-border" type="radio" name="type_id" id="type_id_{$types[tmp2].id}" value="{$types[tmp2].id}" {if !$job.type_id && !$smarty.post.type_id}{if $types[tmp2].id == 1}checked="checked"{/if}{else}{if $types[tmp2].id == $job.type_id}checked="checked"{/if}{if $types[tmp2].id == $smarty.post.type_id}checked="checked"{/if}{/if} />
								<label for="type_id_{$types[tmp2].id}"><img src="{$BASE_URL_ADMIN}img/icon-{$types[tmp2].var_name}.png" alt="{$types[tmp2].name}" /></label>
								{/section}&nbsp;&nbsp;
								<select name="category_id" id="category_id" tabindex="1">
									{section name=tmp1 loop=$categories}
									<option value="{$categories[tmp1].id}" {if $default_categ_id != '' && $default_categ_id == $categories[tmp1].id}selected="selected"{else}{if $categories[tmp1].id == $job.category_id}selected="selected"{/if}{if $categories[tmp1].id == $smarty.post.category_id}selected="selected"{/if}{/if}>{$categories[tmp1].name}</option>
									{/section}
								</select>
							</td>
						</tr>
						<tr>
							<td class="publish-label" valign="top">{$translations.publish.title_label}:</td>
							<td>
								<input {if $errors.title}class="error"{/if} type="text" name="title" id="title" tabindex="2" size="50" value="{if $job.title}{$job.title|escape}{else}{$smarty.post.title|escape}{/if}" />
								{if $errors.title}<span class="validation-error"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" /></span>{/if}
								<div class="{$translations.publish.title_info}"></div>
							</td>
						</tr>
						<tr>
							<td valign="top">{$translations.publish.location_label}:</td>
							<td>
								<select name="city_id" id="city_id" tabindex="3" {if $job.location_outside_ro != ''}disabled="disabled"{/if}>
									<option value="0">{$translations.jobs.location_anywhere}</option>
									{section name="c" loop=$cities}
									<option value="{$cities[c].id}" {if $smarty.post.city_id == $cities[c].id || $job.city_id == $cities[c].id}selected="selected"{else}{if $user_city.id == $cities[c].id AND !$smarty.post.city_id AND !$job.city_id}selected="selected"{/if}{/if}>{$cities[c].name}</option>
									{/section}
								</select>
								<a id="other_location_label" href="#" onclick="Jobber.HandleLocationOutsideRo(); return false;">{if $job.location_outside_ro != ''}pick one from the list{else}other{/if}</a>
								<div id="location_outside_ro" {if $job.location_outside_ro != ''}style="display: block;"{else}style="display: none;"{/if}>
									{$translations.publish.where} <input type="text" name="location_outside_ro_where" id="location_outside_ro_where" size="50" maxlength="140" {if $job.location_outside_ro != ''}value="{$job.location_outside_ro|escape}"{/if} />
									<div class="suggestion">{$translations.publish.where_info}</div>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="top">{$translations.publish.description_label}:</td>
							<td><textarea {if $errors.description}class="error"{/if} tabindex="4" name="description" id="description" cols="80" rows="15">{if $job.description}{$job.description}{else}{$smarty.post.description}{/if}</textarea>
								{if $errors.description}<span class="validation-error"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" /></span>{/if}
								<div class="suggestion">
									<a target="_blank" href="http://www.textism.com/tools/textile/" onclick="$('#textile-suggestions').toggle(); return false;">{$translations.publish.description_info}</a></div>
								<div id="textile-suggestions" style="display: none;">
									<table>
											<thead>
											<tr class="odd">
												<th>{$translations.publish.syntax}</th>
												<th>{$translations.publish.result}</th>
											</tr>
											</thead>
											<tbody>
											<tr class="even">
												<td>That is _incredible_</td>
												<td>That is <em>incredible</em></td>

											</tr>
											<tr class="odd">
												<td>*Indeed* it is</td>
												<td><strong>Indeed</strong> it is</td>
											</tr>
											<tr class="even">
												<td>"Wikipedia":http://www.wikipedia.org</td>

												<td><a href="http://www.wikipedia.org">Wikipedia</a></td>
											</tr>
											<tr class="odd">
												<td>* apples<br />* oranges<br />* pears</td>
												<td>

													<ul>
														<li>apples</li>
														<li>oranges</li>
														<li>pears</li>
													</ul>
												</td>
											</tr>

											<tr class="even">
												<td># first<br /># second<br /># third</td>
												<td>
													<ol>
														<li>first</li>
														<li>second</li>

														<li>third</li>
													</ol>
												</td>
											</tr>
											</tbody>
										</table>
								</div><!-- #textile-suggestions -->
							</td>
						</tr>
					</table>
				</fieldset>
				
				<fieldset>
					<legend>{$translations.publish.company}</legend>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td class="publish-label">{$translations.publish.name_label}:</td>
							<td><input {if $errors.company}class="error"{/if} tabindex="6" type="text" name="company" id="company" size="40" value="{if $job.company}{$job.company|escape}{else}{$smarty.post.company|escape}{/if}" />
							<span class="validation-error">{if $errors.company}<img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />{/if}</span>
							</td>
						</tr> 
						<tr>
							<td valign="top">{$translations.publish.website_label}:</td>
							<td>http://<input tabindex="7" type="text" name="url" id="url" size="35" value="{if $job.company}{$job.url}{else}{$smarty.post.url}{/if}" />
								<div class="suggestion">{$translations.publish.website_info}</div>
							</td>
						</tr>
						<tr>
							<td class="publish-label">{$translations.publish.email_label}<br /><strong>({$translations.publish.email_info1})</strong>:</td>
							<td>
								<input {if $errors.poster_email}class="error"{/if} tabindex="8" type="text" name="poster_email" id="poster_email" size="40" value="{if $job.poster_email}{$job.poster_email}{else}{$smarty.post.poster_email}{/if}" />
								<span class="validation-error">{if $errors.poster_email}<img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="" />{/if}</span>
								<div class="suggestion">
									{$translations.publish.email_info2}
								</div>
							</td>
						</tr>
					</table>
				</fieldset>
				<fieldset><input type="checkbox" name="apply_online" id="apply_online" {if $job.apply_online == 1 || $job.id == 0}checked="checked"{/if}{if !isset($job.apply_online)}checked="checked"{/if} />{$translations.publish.apply_online}</input></fieldset>
				<fieldset>
					<input type="button" id="save" {if $job.id == 0}value="Post"{else}value="Save"{/if} />
					<input type="button" id="preview" value="Preview" />
				</fieldset>
				<fieldset class="hidden">
					<input type="hidden" name="show_preview" id="show_preview" value="false" />
					<input type="hidden" name="job_id" value="{$job.id}" />
				</fieldset>
			</form>
		</div><!-- /content -->
		
		{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#title').focus();
				
				$("#publish_form").validate({
					rules: {
						company: { required: true },
						title: { required: true },
						description: { required: true },
						poster_email: { required: true, email: true }
					},
					messages: {
						company: ' <img src="{/literal}{$BASE_URL_ADMIN}{literal}img/icon-delete.png" alt="" />',
						title: ' <img src="{/literal}{$BASE_URL_ADMIN}{literal}img/icon-delete.png" alt="" />',
						location: ' <img src="{/literal}{$BASE_URL_ADMIN}{literal}img/icon-delete.png" alt="" />',
						description: ' <img src="{/literal}{$BASE_URL_ADMIN}{literal}img/icon-delete.png" alt="" />',
						poster_email: ' <img src="{/literal}{$BASE_URL_ADMIN}{literal}img/icon-delete.png" alt="" />'
					}
				});
				
				$('#save').bind('click', function()
				{
					$("#publish_form").submit();
				});
				
				$('#preview').bind('click', function()
				{
					$('#show_preview').val('true');
					$("#publish_form").submit();
				});
			});
		</script>
		{/literal}

{include file="footer.tpl"}