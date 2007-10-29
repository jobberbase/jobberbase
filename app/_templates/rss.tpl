{include file="header.tpl"}
		
		<div id="content">
			<h3 class="page-heading"><a href="{$BASE_URL}" title="home">Home</a> / RSS</h3>
			<p>
				<strong>jobber</strong> iti pune la dispozitie urmatoarele feed-uri RSS:
			</p>
			<ul>
				<li><a href="{$BASE_URL}rss/toate/">Feed pentru toate categoriile de joburi</a></li>
				{section name=tmp loop=$categories}
				<li><a href="{$BASE_URL}rss/{$categories[tmp].var_name}/">Feed pentru {$categories[tmp].name}</a></li>
				{/section}
			</ul>
		</div><!-- /content -->

{include file="footer.tpl"}