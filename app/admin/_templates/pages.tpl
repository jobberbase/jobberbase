{include file="header.tpl"}
		<div id="content">
				<h3 class="page-heading">Pages</h3>
				<table id="job-posts" class="job-posts" cellspacing="0">
					{foreach from=$pages item=page}
					<tr>
						<td>
							<a href="{$BASE_URL}{$page.url}/" target="_blank">{$page.title}</a> - {$page.page_title}
						</td>
						<td width="200">
							<a href="{$BASE_URL_ADMIN}pages/edit/{$page.url}/" title="Edit"><img src="{$BASE_URL_ADMIN}img/page_white_edit.png" alt="Edit" /> Edit</a>
							<a href="{$BASE_URL_ADMIN}pages/delete/{$page.url}/" title="Delete" onclick="if(!confirm('Are you sure you want to delete this page?'))return false;"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="Edit" /> Delete</a>
						</td>
					</tr>
					{/foreach}
				</table>
				<p></p>
				<p>
					<a href="{$BASE_URL_ADMIN}pages/add/" title="Add new page"><img src="{$BASE_URL_ADMIN}img/page_white_add.png" alt="Add new page" /> Add new page</a>
				</p>
		</div><!-- #content -->

{include file="footer.tpl"}