{if !$jobs}
    {if $CURRENT_PAGE != 'search'}
        <div class="alert alert-info">
            <p>{$translations.manage.invalid_auth}</p>
        </div>
        {if $smarty.const.ENABLE_NEW_JOBS}
            <p><a href="{$BASE_URL}post/" title="{$translations.manage.new_job_title}">{$translations.footer.new_job}</a></p>
        {/if}
    {else}
        <div id="alert alert-info">
            <p>{$translations.jobs.no_job_found}</p>
        </div>
    {/if}
{else}
    {include file="includes/jobs-list.tpl" manage=true}
{/if}

<br/>
{$pages}
