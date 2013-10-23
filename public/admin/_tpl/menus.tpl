{include file="header.tpl"}
	<div id="content">
		<h2 id="links">Navigation Links</h2>
		
		<div class="information">If you want to hide a menu from the frontend simply remove all links from the corresponding menu. It could be that some links are hardcoded. You'll have to edit the template files to remove those links.</div>
		
		<div class="list menusContainer">
			{foreach from=$menus item=menu name=menus}
			<div class="menuItem row {if $smarty.foreach.menus.index % 2 == 0}even{else}odd{/if}">
				<div class="buttons">
					<a href="{$BASE_URL_ADMIN}links/{$menu.varname}/" title="Edit menu"><img src="{$BASE_URL_ADMIN}_tpl/img/pencil.png" alt="Edit" /></a>
{*
					<a href="#" title="Delete this menu" class="deleteLink"><img src="{$BASE_URL_ADMIN}_tpl/img/bin.png" alt="Delete" /></a>
*}
				</div>
				<h4 class="bold mb05"><a href="{$BASE_URL_ADMIN}links/{$menu.varname}/">{$menu.name}</a></h4>
				<div>{$menu.title}</div>
			</div>
			{/foreach}
		</div>
{*
		<p></p>
		<p><a href="#" class="addNewMenu" title="Add new menu"><img src="{$BASE_URL_ADMIN}_tpl/img/plus-button.png" alt="Add new menu" /></a></p>
*}
	</div><!-- #content -->

{include file="footer.tpl"}
