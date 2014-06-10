{include file="includes/header.tpl"}

<div class="alert alert-info">
    <p>{$translations.jobs.no_job_found}</p>
</div>

<p>
    {if $smarty.const.ENABLE_NEW_JOBS}
        <a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a> &middot;
    {/if}
    <a href="{$BASE_URL}">{$translations.notfound.back}</a>
</p>

{include file="includes/footer.tpl"}