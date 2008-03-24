{include file="header.tpl"}
		
		<div id="content">
			<h3 class="page-heading">Stats</h3>
			<div id="accordion-list">
				<h3>{$translations.stas.last_50_posts}:</h3> 
				<ul> 
					<li>{$translations.stas.total}: {$applications.count}</li> 
					<li>{$translations.stas.average} / {$translations.stas.last_7_days}: {$applications.avg}</li> 
					<li>{$translations.stas.maximum} / {$translations.stas.last_7_days}: {$applications.max}</li> 
				</ul>
				<br />
				{$applications.stats}
				<h3>{$translations.stas.last_50_searches}:</h3>
				<ul> 
					<li>{$translations.stas.total}: {$keywordz.count}</li> 
					<li>{$translations.stas.average} / {$translations.stas.last_7_days}: {$keywordz.avg}</li> 
					<li>{$translations.stas.maximum} / {$translations.stas.last_7_days}: {$keywordz.max}</li> 
				</ul>
				<br />
				{$keywordz.stats}
			</div>
		</div><!-- #content -->

{include file="footer.tpl"}