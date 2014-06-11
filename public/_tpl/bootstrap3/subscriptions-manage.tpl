{include file="includes/header.tpl"}

<div class="page-header">
    <h2>{$translations.subscriptions.manage_title}</h2>
</div>

{if $subscriptions_updated}
    <div class="alert alert-success">{$translations.subscriptions.updated_message}</div>
{else}
    {if $page}
        <div class="subscribe-page-content">
            {$page.content}
        </div>
    {/if}
{/if}
<form id="manage_subscriptions_form" method="post" class="form-horizontal" action="{$BASE_URL}subscriptions/">
    {$label_width = 2}
    {$label_class = "col-md-`$label_width`"}
    {$control_width = 8}
    {$control_class = "col-md-`$control_width`"}

    <div class="form-group">
        <label for="#" class="control-label {$label_class}">{$translations.subscriptions.subscribe_categories_title}</label>
        <div class="{$control_class}">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="categories[]" id="" value="0" {if $subscriptions_all_jobs_subscribed}checked="checked"{/if}/>
                    {$translations.subscriptions.all_jobs}
                </label>
            </div>

            {foreach item=category from=$subscriptions_categories}
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="categories[]" id="" value="{$category.id}" {if $category.subscribed}checked="checked"{/if}/>
                        {$category.name}
                    </label>
                </div>
            {/foreach}
        </div>
    </div>

    <div class="form-group">
        <label for="fld_email" class="control-label {$label_class}">{$translations.subscriptions.subscribe_email_label}</label>
        <div class="{$control_class}">
            <input type="text" id="fld_email" name="email" class="form-control" value="{$subscriptions_email}" readonly="readonly" />
        </div>
    </div>

    <div class="form-group">
        <label for="fld_keywords" class="control-label {$label_class}">Keywords</label>
        <div class="{$control_class}">
            <div class="help-block">{$translations.subscriptions.keywords}</div>
            <input type="text" id="fld_keywords" class="form-control" name="keywords" value="{$subscriptions_keywords}" />
        </div>
    </div>

    <div class="form-group">
        <div class="{$control_class} col-md-offset-{$label_width}">
            <input type="hidden" name="auth" value="{$subscriptions_auth}" />
            <button type="submit" name="save_settings" value="1" class="btn btn-primary">{$translations.subscriptions.save_settings}</button>
            <button type="submit" name="delete_subscriber" value="1" class="btn btn-default">{$translations.subscriptions.remove_subscriber}</button>
        </div>
    </div>
</form>

{include file="includes/footer.tpl"}
