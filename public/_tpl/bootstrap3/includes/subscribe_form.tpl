{if !isset($category_id)}
    {$category_id = 0}
{/if}
<form id="frm-subscribe" method="post" action="{$BASE_URL}subscribe/" class="form-inline" role="form">
    <div class="form-group">
        <label for="subscribe_email" class="control-label sr-only">{$translations.subscriptions.subscribe_email_label}</label>
        <input type="email" name="email" id="subscribe_email" maxlength="50" size="30" class="form-control" placeholder="{$translations.subscriptions.subscribe_email_label}">
    </div>
    <div class="form-group">
        <input type="hidden" name="category" value="{$category_id}">
        <button type="submit" id="submit" class="btn btn-default">{$translations.subscriptions.subscribe_submit}</button>
    </div>
</form>

<div id="subscribe-response"></div>