{include file="header.tpl"}

		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading">Site widget</h3>
			<h4>Would you like to display our latest jobs on your site?</h4>
			<p>Insert one of the following snippets in your page's HTML code, in the position where the ads should appear:</p>
			<ol>
				<li>Get latest 5 jobs from all categories and all types, posted in the past 7 days, in random order:
					<pre><code>{literal}&lt;script src="{/literal}{$BASE_URL}{literal}api/api.php?action=getJobs
&amp;type=0&amp;category=0&amp;count=5&amp;random=1&amp;days_behind=7&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;

&lt;script type="text/javascript"&gt;<strong>showJobs('jobber-container', 'jobber-list');</strong>&lt;/script&gt;{/literal}</code></pre>
				</li>
				<li>Get last 10 full-time jobs for programmers, posted in the past 15 days, ordered by publish date (newest on top):
					<pre><code>{literal}&lt;script src="{/literal}{$BASE_URL}{literal}api/api.php?action=getJobs
&amp;type=fulltime&amp;category=programmers&amp;count=10&amp;random=0&amp;days_behind=15&amp;response=js" 
type="text/javascript"&gt;&lt;/script&gt;

&lt;script type="text/javascript"&gt;<strong>showJobs('jobber-container', 'jobber-list');</strong>&lt;/script&gt;{/literal}</code></pre>
				</li>
				<li>Get latest jobs published by a company (e.g. Google):
					<pre><code>{literal}&lt;script src="{/literal}{$BASE_URL}{literal}api/api.php?action=getJobsByCompany
&amp;company=google&amp;count=10&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;

&lt;script type="text/javascript"&gt;<strong>showJobs('jobber-container', 'jobber-list');</strong>&lt;/script&gt;{/literal}</code></pre>
				</li>
			</ol>
			<h2>The parameters you can use when calling the API, are:</h2>
				<ul>
			  <li><strong>action</strong>: "getJobs" - all jobs / "getJobsByCompany" - a single company's jobs</li>
			  <li><strong>type</strong>: "0" - toate / "fulltime" / "parttime" / "freelance";</li>
			  <li><strong>category</strong>: "0" - all / "programmers" / "designers" / "administrators" / "managers" / "testers" / "editors";</li>
			  <li><strong>count</strong>: number of job ads to display;</li>
			  <li><strong>random</strong>: "1" - display randomly / "0" - display ordered by publish date (newest on top);</li>
			  <li><strong>days_behind</strong>: get only jobs posted in the past X days (type "0" if you don't want to limit this);</li>
			  <li><strong>response</strong>: "js" - returns jobs as JavaScript code / "json" - returns only a JSON string / "xml" - returns an XML.</li>
			</ul>
			<h2>Use CSS to style the list:</h2>
			<pre><code>{literal}ul.jobber-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
ul.jobber-list li {
  margin-bottom: 5px;
}{/literal}</pre></code>

		</div><!-- /content -->

{include file="footer.tpl"}