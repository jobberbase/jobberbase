{include file="includes/header.tpl"}


<div id="job-listings">
    {include file="includes/filter.tpl" current_url="{$BASE_URL}{$URL_JOBS}"}
    <div class="page-header">
        <h2>
            {$translations.alljobs.all_jobs}
        </h2>
    </div>
    {include file="includes/posts-loop.tpl"}
</div>

<hr/>
<div class="well">
    <h4>{$translations.subscriptions.subscribe_message}</h4>

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