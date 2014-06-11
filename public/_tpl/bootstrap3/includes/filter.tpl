{if $jobs}
    {if !isset($current_url)}
        {$current_url = "{$BASE_URL}{$URL_JOBS}/{$current_category}"}
    {/if}

    <div class="filters text-right">
        {$translations.category.display_only}
        {section name=tmp loop=$types}
            {$type = $types[tmp].var_name}
            {if $type eq 'fulltime'}
                {$class = 'success'}
            {elseif $type eq 'parttime'}
                {$class = 'info'}
            {elseif $type eq 'freelance'}
                {$class = 'warning'}
            {else}
                {$class = 'default'}
            {/if}

            <a href="{$current_url}/{$types[tmp].var_name}/" title="{$current_category} {$types[tmp].name}" class="btn btn-xs btn-{$class}">
                {$types[tmp].name}
            </a>
        {/section}
    </div>
{/if}