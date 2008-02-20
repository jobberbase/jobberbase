{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading">{$translations.sitemap.title}</h3>
			<h4>{$translations.sitemap.jobs}:</h4>
			<ul>
				{section name=tmp loop=$categories}
        		<li id="{$categories[tmp].var_name}"><a href="{$BASE_URL}jobs/{$categories[tmp].var_name}/" title="{$categories[tmp].var_name}">{$categories[tmp].name}</a></li>
				{/section}
			</ul>
			<h4>{$translations.sitemap.use}:</h4>
			<ul>
				<li><a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a></li>
				<li><a href="{$BASE_URL}widgets/" title="{$translations.footer.widgets_title}">{$translations.footer.widgets}</a></li>
				<li><a href="{$BASE_URL}rss/" title="{$translations.footer.title}">{$translations.footer.rss}</a></li>
			</ul>
			<h4>{$translations.sitemap.more}:</h4>
			<ul>
				<li><a href="{$BASE_URL}companies/" title="{$translations.footer.companies_title}">{$translations.footer.companies}</a></li>
				{foreach from=$articles item=article}
				<li><a href="{$BASE_URL}{$article.url}/" title="{$article.page_title}">{$article.title}</a></li>
				{/foreach}
			</ul>
		</div><!-- /content -->

{include file="footer.tpl"}