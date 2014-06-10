{include file="includes/header.tpl"}


<div class="page-header">
    <h2>Site Widgets</h2>
</div>

<p>Would you like to display our latest jobs on your site? There are two types of widgets you can apply.</p>

<br/>
<h4>Get Jobs Widget</h4>
<p>This widget is used to retrive jobs based on their category, posting duration, and job-type. You can also configure on how many jobs you want to display and order them on the basis of their publication date or even show randomly.</p>
<p>List of parameters to be used in this implementation:</p>
<ul>
    <li><strong>action</strong>: "getJobs" - all jobs</li>
    <li><strong>type</strong>: "0" - all / "fulltime" / "parttime" / "freelance"</li>
    <li><strong>category</strong>: "0" - all / "programmers" / "designers" / "administrators" / "managers" / "testers" / "editors"</li>
    <li><strong>count</strong>: number of job ads to display</li>
    <li><strong>random</strong>: "1" - display randomly / "0" - display ordered by publish date (newest on top)</li>
    <li><strong>days_behind</strong>: get only jobs posted in the past X days (type "0" if you don't want to limit this)</li>
    <li><strong>response</strong>: "js" - returns jobs as JavaScript code / "json" - returns only a JSON string / "xml" - returns an XML</li>
</ul>

<p>The following code displays last 5 jobs posted in the past 10 days in administrator category as fulltime and ordered by publishing date(newest on top):</p>
<pre>&lt;script src="{$BASE_URL}api/api.php?action=getJobs<br />&amp;type=fulltime&amp;category=administrators&amp;count=5&amp;random=0&amp;days_behind=10&amp;response=js" <br />type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;showJobs('jobber-container', 'jobber-list');&lt;/script&gt;</pre>

<p>The following code displays latest 5 jobs from all categories of all types posted in last 7 days in random order:</p>
<pre>&lt;script src="{$BASE_URL}api/api.php?action=getJobs<br />&amp;type=0&amp;category=0&amp;count=5&amp;random=1&amp;days_behind=7&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;showJobs('jobber-container', 'jobber-list');&lt;/script&gt;</pre>

<br/>
<h4>Get Jobs by Company Widget</h4>
<p>This widget is used to retrive jobs based on their company and their count.</p>

<p>List of parameters to be used in this implementation:</p>
<ul>
    <li><strong>action</strong>: "getJobsByCompany" - a single company's jobs</li>
    <li><strong>count</strong>: number of job ads to display</li>
    <li><strong>response</strong>: "js" - returns jobs as JavaScript code / "json" - returns only a JSON string / "xml" - returns an XML</li>
</ul>
<p>A code for this get latest 10 jobs published by Google:</p>
<pre>&lt;script src="{$BASE_URL}api/api.php?action=getJobsByCompany<br />&amp;company=google&amp;count=10&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;showJobs('jobber-container', 'jobber-list');&lt;/script&gt;</pre>


<br/>
<h4>CSS Styling</h4>
<p>You can use some custom css to style the display the job list. Here is a sample code:</p>
<pre>ul.jobber-list &#123;<br />  list-style-type: none;<br />  margin: 0;<br />  padding: 0;<br />&#125;<br /><br />ul.jobber-list li &#123;<br />  margin-bottom: 5px;<br />&#125;</pre>
<br /><strong>Note:</strong>
<ul>
    <li>You can notice that there are two script codes for each implementation, the script which points to the api.php class can be included anywhere in your site but the second code should appear at the place where you want to display the jobs.</li>
    <li>There is a live demo script using the api code. <a href="{$BASE_URL}api/test.php">Test it now</a>. You can view its source in browser to check its implmentation. You can edit it live to test it before implementing the code live elsewhere.</li>
</ul>

{include file="includes/footer.tpl"}
