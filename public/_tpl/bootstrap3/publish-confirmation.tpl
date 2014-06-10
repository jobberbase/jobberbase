{include file="includes/header.tpl"}


<ul class="pagination pagination-lg">
    <li><a href="{$BASE_URL}post/{$job.id}/">{$translations.publish.step1}</a></li>
    <li><a href="{$BASE_URL}verify/{$job.id}/">{$translations.publish.step2}</a></li>
    <li class="active"><a href="#">{$translations.publish.step3}</a></li>
</ul>

{if $laterEdit}
    <div class="alert alert-success">
        {$translations.publish.edit_success}: <a href="{$job_url}">{$job_url}</a>
    </div>
    <p>
        <a href="{$BASE_URL}" class="btn btn-default">&laquo; {$translations.notfound.back}</a>
    </p>
{else}
    {if $postRequiresModeration}
        <div class="alert alert-info">
            {$translations.publish.success_message}
        </div>
        <p>
            <a href="{$BASE_URL}" class="btn btn-default">&laquo; {$translations.notfound.back}</a>
        </p>
    {else}
        <div class="alert alert-success">
            <strong>{$translations.publish.congratulations}</strong><br /><a href="{$job_url}">{$translations.publish.view}</a>.
        </div>
        <h4>{$translations.publish.options_title}</h4>
        <p>
            {$translations.publish.options_info}:
        </p>
        <ul class="list-unstyled">
            <li><a href="{$BASE_URL}post/{$CURRENT_ID}/{$auth}/" title="{$translations.publish.edit}">&raquo; {$translations.publish.edit}</a></li>
            <li><a href="{$BASE_URL}deactivate/{$CURRENT_ID}/{$auth}/" title="{$translations.publish.deactivate}">&raquo; {$translations.publish.deactivate}</a></li>
        </ul>
    {/if}
{/if}

{include file="includes/footer.tpl"}