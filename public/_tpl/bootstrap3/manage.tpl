{include file="includes/header.tpl"}
		
<div class="page-header">
    <h2>{$translations.manage.manage_jobs} {if $poster_email != ''}({$poster_email}){/if}</h2>
</div>

<div id="job-listings">
    {include file="includes/posts-loop-manage.tpl"}
</div>

{include file="includes/footer.tpl"}