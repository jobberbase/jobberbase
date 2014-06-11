{include file="includes/header.tpl"}

<div class="page-header">
    <h2>{$translations.subscriptions.subscribe_title}</h2>
</div>

{if $page}
    <div class="subscribe-page-content">
        {$page.content}
    </div>
{/if}

<div id="subscribe">
    {include file="includes/subscribe_form.tpl"}
</div>

<script type="text/javascript">
    {literal}
        $(document).ready(function()
        {
            Jobber.Subscribe.init();
        });
    {/literal}
</script>

{include file="includes/footer.tpl"}
