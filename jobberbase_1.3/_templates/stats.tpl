{include file="header.tpl"}
		
		<div id="content">
			<h3 class="page-heading">Stats</h3>
			<div id="accordion-list">
				<h3>Online applications, last 50 displayed:</h3> 
				<ul> 
					<li>total: {$applications.count}</li> 
					<li>avg / last 7 days: {$applications.avg}</li> 
					<li>max / last 7 days: {$applications.max}</li> 
				</ul>
				<br />
				{$applications.stats}
				<h3>Site searches, last 50 displayed:</h3>
				<ul> 
					<li>total: {$keywordz.count}</li> 
					<li>avg / last 7 days: {$keywordz.avg}</li> 
					<li>max / last 7 days: {$keywordz.max}</li> 
				</ul>
				<br />
				{$keywordz.stats}
			</div>
		</div><!-- #content -->

{include file="footer.tpl"}