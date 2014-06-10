{include file="includes/header.tpl"}


<div id="job-listings">
    {include file="includes/filter.tpl"}
    <div class="page-header">
        <h2>
            {$translations.category.jobs_for} {$current_category_name}
        </h2>
    </div>
    {include file="includes/posts-loop.tpl"}
</div>

<hr/>
<div class="well">
    <h4>{$translations.subscriptions.subscribe_message}</h4>

    {include file="includes/subscribe_form.tpl" category_id={$current_category_id}}
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
