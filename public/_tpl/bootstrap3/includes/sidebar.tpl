{if $navigation.secondary}
    <h3>{$translations.sidebar.menu_title}</h3>
    <ul class="nav-right list-unstyled">
        {section name=tmp loop=$navigation.secondary}
            {if $smarty.const.ENABLE_NEW_JOBS || (!$smarty.const.ENABLE_NEW_JOBS && $navigation.secondary[tmp].url != 'post')}
                <li><a href="{if $navigation.secondary[tmp].outside != 1}{$BASE_URL}{/if}{$navigation.secondary[tmp].url}/" title="{$navigation.secondary[tmp].title}" >{$navigation.secondary[tmp].name}</a></li>
            {/if}
        {/section}
    </ul>
{/if}

{if $smarty.session.last_viewed_jobs}
    <h3>{$translations.header.seen_recently}</h3>
    <ul class="nav-right list-unstyled">
        {section name=last loop=$smarty.session.last_viewed_jobs}
            <li><a href="{$smarty.session.last_viewed_jobs[last].url}">{$smarty.session.last_viewed_jobs[last].title}</a></li>
        {/section}
    </ul>
{/if}

{if !$CURRENT_PAGE }
    <div id="stats">
        <h3>{$jobs_count_all} {$translations.homepage.sidebar_totaljobs}</h3>
        <ul class="nav-right list-unstyled">
            {if $smarty.const.SIDEBAR_SHOW_WHAT == 'categories'}
                {foreach item=job from=$jobs_count_all_categs}
                    <li>
                        <a href="{$BASE_URL}{$URL_JOBS}/{$job.categ_varname}/">
                            <span class="badge pull-right">{$job.categ_count}</span>
                            {$job.categ_name}
                        </a>
                    </li>
                {/foreach}
            {else}
                {foreach item=job from=$jobs_count_per_city}
                    <li>
                        <a href="{$BASE_URL}{$URL_JOBS_IN_CITY}/{$job.city_ascii_name}/">
                            <span class="badge pull-right">{$job.jobs_in_city}</span>
                            {$job.city_name}
                        </a>
                    </li>
                {/foreach}
                {if !$hide_other_cities_in_sidebar}
                    <li>
                        <a href="{$BASE_URL}jobs-in-other-cities/">
                            <span class="badge pull-right">{$jobs_count_in_other_cities}</span>
                            {$translations.sidebar.other_cities}
                        </a>
                    </li>
                {/if}
            {/if}
        </ul>
    </div><!-- #stats -->
{/if}