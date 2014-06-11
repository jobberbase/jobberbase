{include file="includes/header.tpl"}

<div class="page-header">
    <h3>{$translations.rss.title}</h3>
</div>
<p>
    {$translations.rss.intro}
</p>
<ul>
    <li><a href="{$BASE_URL}rss/all/">{$translations.rss.all_categories}</a></li>
    {section name=tmp loop=$categories}
        <li><a href="{$BASE_URL}rss/{$categories[tmp].var_name}/">{$translations.rss.for} {$categories[tmp].name}</a></li>
    {/section}
</ul>

{include file="includes/footer.tpl"}