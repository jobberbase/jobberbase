{include file="includes/header.tpl"}


<ul class="pagination pagination-lg hidden-xs">
    <li><a href="{$BASE_URL}post/{$job.id}/">{$translations.publish.step1}</a></li>
    <li class="active"><a href="{$BASE_URL}verify/{$job.id}/">{$translations.publish.step2}</a></li>
    <li class="disabled"><a href="#">{$translations.publish.step3}</a></li>
</ul>

{include file="includes/job-details.tpl"}

<form name="publish_form" id="publish_form" method="post" action="{$BASE_URL}publish/{$job.id}/">
    <fieldset>
        <div class="alert alert-info">
            <div class="suggestion">{$translations.publish.step2_info}
            <a href="{$BASE_URL}deactivate/{$job.id}/" title="{$translations.publish.step2_cancel}">{$translations.publish.step2_cancel}</a></div>
        </div>

        {if $smarty.session.later_edit}
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="{$translations.publish.save}" />
        {else}
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="{$translations.publish.publish}" />
        {/if}
        <a href="{$BASE_URL}post/{$job.id}/" class="btn btn-link" title="{$translations.publish.edit}">{$translations.publish.edit}</a>
    </fieldset>
</form>

{include file="includes/footer.tpl"}