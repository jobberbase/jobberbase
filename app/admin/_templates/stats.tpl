{include file="header.tpl"}
		
		<div id="content">
			<h3 class="page-heading">Stats</h3>
			<div id="accordion-list">
				<h3>{$translations.stats.last_50_posts}:</h3> 
				<ul> 
					<li>{$translations.stats.total}: {$applications.count}</li> 
					<li>{$translations.stats.average} / {$translations.stats.last_7_days}: {$applications.avg}</li> 
					<li>{$translations.stats.maximum} / {$translations.stats.last_7_days}: {$applications.max}</li> 
				</ul>
				<br />
				{$applications.stats}
				<h3>{$translations.stats.last_50_searches}:</h3>
				<ul> 
					<li>{$translations.stats.total}: {$keywordz.count}</li> 
					<li>{$translations.stats.average} / {$translations.stats.last_7_days}: {$keywordz.avg}</li> 
					<li>{$translations.stats.maximum} / {$translations.stats.last_7_days}: {$keywordz.max}</li> 
				</ul>
				<br />
				{$keywordz.stats}
			</div>
		</div><!-- #content -->

{include file="footer.tpl"}