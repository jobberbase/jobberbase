{include file="header.tpl"}

	<div id="content">
			<h3 class="page-heading">Cities</h3>
			<table id="job-posts" cellspacing="0">
				{if $cities|@count > 50}
					<p>
						<a href="{$BASE_URL_ADMIN}cities/prepare-add/" title="Add new city"><img src="{$BASE_URL_ADMIN}img/add.png" alt="Add new city" /> Add new city</a>
					</p>
				{/if}
				{foreach from=$cities item=city}
				<tr id="item{$city.id}">
					<td>
						{$city.name} ({$city.ascii_name})
					</td>
					<td width="200">
						<a href="{$BASE_URL_ADMIN}cities/prepare-edit/{$city.id}/" title="Edit"><img src="{$BASE_URL_ADMIN}img/page_white_edit.png" alt="Edit" /> Edit</a>
						<a href="javascript:void(0);" title="Delete" onclick="jobberBase.deleteCity('{$BASE_URL_ADMIN}cities/delete/', {$city.id})"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="Edit" /> Delete</a>
					</td>
				</tr>
				{/foreach}
			</table>
			<p>
				<a href="{$BASE_URL_ADMIN}cities/prepare-add/" title="Add new city"><img src="{$BASE_URL_ADMIN}img/add.png" alt="Add new city" /> Add new city</a>
			</p>
	</div><!-- #content -->

{include file="footer.tpl"}