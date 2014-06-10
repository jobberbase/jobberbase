<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{if $seo_title}{$seo_title}{else}{$html_title}{/if}</title>
    <meta name="description" content="{if $seo_desc}{$seo_desc}{else}{$meta_description}{/if}" />
    <meta name="keywords" content="{if $seo_keys}{$seo_keys}{else}{$meta_keywords}{/if}" />
    <link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" />

    {if $CURRENT_PAGE == '' || $CURRENT_PAGE != 'jobs'}
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$BASE_URL}rss/all/" />
    {else}
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$BASE_URL}rss/{$current_category}/" />
    {/if}

    <link rel="stylesheet" href="{$BASE_URL}_tpl/{$THEME}/vendor/bootstrap/dist/css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="{$BASE_URL}_tpl/{$THEME}/vendor/bootswatch/spacelab/bootstrap.min.css"/>-->
    <link rel="stylesheet" href="{$BASE_URL}_tpl/{$THEME}/css/main.css"/>

    <script type="text/javascript" src="{$BASE_URL}_tpl/{$THEME}/vendor/jquery/dist/jquery.min.js"></script>
    {if $editor}
        <script src="{$BASE_URL}js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
    {/if}
</head>
<body>
<header id="header">
    <div class="container">
        {if $smarty.session.status neq ''}
            <div class="alert alert-info">
                {$smarty.session.status}
            </div>
        {/if}
        <div class="row">
            <div class="col-md-6">
                <div class="logo">
                    <a href="{$BASE_URL}" title="{$translations.header.title}"><img src="{$BASE_URL}img.php?q=site_logo" alt=""/></a>
                </div>
            </div>
            <div class="col-md-6">
                <ul id="top" class="nav nav-pills pull-right">
                    {if $navigation.primary != ''}
                        {section name=tmp loop=$navigation.primary}
                            {if $smarty.const.ENABLE_NEW_JOBS || (!$smarty.const.ENABLE_NEW_JOBS && $navigation.primary[tmp].url != 'post')}
                                <li><a href="{if $navigation.primary[tmp].outside != 1}{$BASE_URL}{/if}{$navigation.primary[tmp].url}/" title="{$navigation.primary[tmp].title}" >{$navigation.primary[tmp].name}</a></li>
                            {/if}
                        {/section}
                    {/if}
                </ul>
                <div class="clearfix"></div>

                <div class="rss-feed pull-right">
                    <a href="{$BASE_URL}rss/all/" title="{$translations.header.rss_title}"><img src="{$BASE_URL}_tpl/{$THEME}/img/bt-rss.png" alt="{$translations.header.rss_alt}" /></a>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="search">
    <div class="container">
        <div class="well well-lg">
            <form action="{$BASE_URL}search/" method="post">
                <div class="row">
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="keywords" id="keywords" maxlength="30" class="form-control input-lg" placeholder="{$translations.search.default}" value="{if $keywords}{$keywords}{/if}">
                        <!--<span class="help-block">{$translations.search.example}</span>-->
                    </div>
                    {if $smarty.const.ENABLE_NEW_JOBS}
                        <div class="col-sm-4 col-md-3 col-md-offset-3">
                            <a href="{$BASE_URL}post/" class="btn btn-primary btn-lg btn-block">{$translations.search.submit}</a>
                        </div>
                    {/if}
                </div>
            </form>
        </div>
    </div>
</section>

<nav id="nav">
    <div class="container">
        <ul class="nav nav-tabs">
            {section name=tmp loop=$categories}
                <li id="{$categories[tmp].var_name}" {if $current_category == $categories[tmp].var_name}class="active"{/if}><a href="{$BASE_URL}{$URL_JOBS}/{$categories[tmp].var_name}/" title="{$categories[tmp].name}">{$categories[tmp].name}</a></li>
            {/section}
        </ul>
    </div>
</nav>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 col-lg-9">