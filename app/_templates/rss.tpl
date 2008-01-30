{include file="header.tpl"}
		
		<div id="content">
			<h3 class="page-heading"><a href="{$BASE_URL}" title="home">Home</a> / RSS</h3>
			<p>
				Please choose one (or more) of the following feeds:
			</p>
			<ul>
				<li><a href="{$BASE_URL}rss/all/">Feed for all categories</a></li>
				{section name=tmp loop=$categories}
				<li><a href="{$BASE_URL}rss/{$categories[tmp].var_name}/">Feed for {$categories[tmp].name}</a></li>
				{/section}
			</ul>
		</div><!-- /content -->

{include file="footer.tpl"}