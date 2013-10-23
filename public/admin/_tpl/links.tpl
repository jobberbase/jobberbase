{include file="header.tpl"}
	<!--[if lt IE 8]>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>
	<![endif]-->
	<div id="content">
		<h2 id="links">{$menu_name}</h2>
		<div id="linksContainer" rel="{$menu_id}">
		{foreach from=$links item=menu}
			{section name=tmp loop=$menu}
			<div class="linkItem" rel="{$menu[tmp].id}">
				<div class="linkHandle" draggable="true"></div>
				<div class="linkWrapper">
					<div class="buttons">
						<a href="#" title="Move this link up" class="moveLinkUp"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-up.png" alt="Move up" /></a>
						<a href="#" title="Move this link down" class="moveLinkDown"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-down.png" alt="Move down" /></a>
						<a href="#" title="Unnest this link" class="unnestLink"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-left.png" alt="Unnest" /></a>
						<a href="#" title="Nest this link" class="nestLink"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-right.png" alt="Nest" /></a>
						<a href="#" title="Delete this link" class="deleteLink"><img src="{$BASE_URL_ADMIN}_tpl/img/bin.png" alt="Delete" /></a>
					</div>
					<label><span>Name:</span><input type="text" size="60" name="name{$menu[tmp].id}" value="{$menu[tmp].name}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="The text you want to display in the frontend" /></label>
					<a href="#" title="Save changes" class="saveLink" style="display: none;"><img src="{$BASE_URL_ADMIN}_tpl/img/disk.png" alt="Save" /></a>
					<label><span>Url:</span><input type="text" size="60" name="url{$menu[tmp].id}" value="{$menu[tmp].url}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="The URL you want to link to. When you want to link to a Jobberbase page (e.g. the page Contact) you can use the Jobberbase URL (e.g. contact)" /></label>
					<label><span>Title:</span><input type="text" size="60" name="title{$menu[tmp].id}" value="{$menu[tmp].title}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="Text that shows when you hover over the link, just like this help message. You can leave this blank if you don't want to show anything" /></label>
				</div>
				<div class="linkChildren">{section name=tmp2 loop=$menu[tmp].children}
					<div class="linkItem" rel="{$menu[tmp].children[tmp2].id}">
						<div class="linkHandle" draggable="true"></div>
						<div class="linkWrapper">
							<div class="buttons">
								<a href="#" title="Move this link up" class="moveLinkUp"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-up.png" alt="Move up" /></a>
								<a href="#" title="Move this link down" class="moveLinkDown"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-down.png" alt="Move down" /></a>
								<a href="#" title="Unnest this link" class="unnestLink"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-left.png" alt="Unnest" /></a>
								<a href="#" title="Nest this link" class="nestLink"><img src="{$BASE_URL_ADMIN}_tpl/img/arrow-right.png" alt="Nest" /></a>
								<a href="#" title="Delete this link" class="deleteLink"><img src="{$BASE_URL_ADMIN}_tpl/img/bin.png" alt="Delete" /></a>
							</div>
							<label><span>Name:</span><input type="text" size="60" name="name{$menu[tmp].children[tmp2].id}" value="{$menu[tmp].children[tmp2].name}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="The text you want to display in the frontend" /></label>
							<a href="#" title="Save changes" class="saveLink" style="display: none;"><img src="{$BASE_URL_ADMIN}_tpl/img/disk.png" alt="Save" /></a>
							<label><span>Url:</span><input type="text" size="60" name="url{$menu[tmp].children[tmp2].id}" value="{$menu[tmp].children[tmp2].url}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="The URL you want to link to. When you want to link to a Jobberbase page (e.g. the page Contact) you can use the Jobberbase URL (e.g. contact)" /></label>
							<label><span>Title:</span><input type="text" size="60" name="title{$menu[tmp].children[tmp2].id}" value="{$menu[tmp].children[tmp2].title}" /><img class="help" src="{$BASE_URL_ADMIN}_tpl/img/information-balloon.png" title="Text that shows when you hover over the link, just like this help message. You can leave this blank if you don't want to show anything" /></label>
						</div>
					</div>
				{/section}</div>
			</div>
			{/section}
		{/foreach}
		</div>
		<p></p>
		<p><a href="#" class="addNewLink" title="Add new link"><img src="{$BASE_URL_ADMIN}_tpl/img/plus-button.png" alt="Add new link" /></a></p>
	</div><!-- #content -->

{include file="footer.tpl"}
