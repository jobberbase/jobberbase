{include file="header.tpl"}
		<div id="content">
				{if $links == ''}
					<h3 class="page-heading">Navigation Links</h3>
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}links/primary'>Primary Menu &raquo;</a></span>
						<span class="category_description"><br/>The primary menu for your Jobberbase theme. By default this menu is located at the top.</span>
					</div>
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}links/secondary'>Secondary Menu &raquo;</a></span>
						<span class="category_description"><br/>The secondary menu for your Jobberbase theme. By default this menu is located in the sidebar.</span>
					</div>
					<br />
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}links/footer1'>Footer Column 1 &raquo;</a></span>
						<span class="category_description"><br/>The default footer holds 3 columns with links.</span>
					</div>
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}links/footer2'>Footer Column 2 &raquo;</a></span>
						<span class="category_description"><br/>The default footer holds 3 columns with links.</span>
					</div>
					<div class="category_box">
						<span class="category_name"><a href='{$BASE_URL_ADMIN}links/footer3'>Footer Column 3 &raquo;</a></span>
						<span class="category_description"><br/>The default footer holds 3 columns with links.</span>
					</div>
				{else}
					<h3 class="page-heading">{$menu_name}<span class="back_to_overview"><a href='{$BASE_URL_ADMIN}links' title='Back to overview'>&laquo; Back to overview</a></span></h3>
					<div id="linksContainer">
					{foreach from=$links item=menu}
						{section name=tmp loop=$menu}
							<div class="linkItem" rel="{$menu[tmp].id}">
								<div class="linkHandle"></div>
								<div class="linkWrapper">
									<a href="#" title="Delete" class="deleteLink"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="Edit" /> Delete</a>
									<label><span>Name:</span><input type="text" size="60" name="name{$menu[tmp].id}" value="{$menu[tmp].name}" /></label>
									<a href="#" title="Save" class="saveLink" style="display: none;"><img src="{$BASE_URL_ADMIN}img/disk.png" alt="Save" /> Save</a>
									<label><span>Url:</span><input type="text" size="60" name="url{$menu[tmp].id}" value="{$menu[tmp].url}" /></label>
									<label><span>Title:</span><input type="text" size="60" name="title{$menu[tmp].id}" value="{$menu[tmp].title}" /></label>
									</label>
									<div class="clear"></div>
								</div>
							</div>
						{/section}
					{/foreach}
					</div>
				<p></p>
				<p><a href="#" title="Add new link"><img src="{$BASE_URL_ADMIN}img/add.png" alt="Add new link" /> Add new link</a></p>
				{/if}
		</div><!-- #content -->

{include file="footer.tpl"}