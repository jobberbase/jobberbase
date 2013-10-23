<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>{if $smarty.const.SITE_NAME}{$smarty.const.SITE_NAME} | Admin{else}jobberBase Admin{/if}</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="{$meta_description}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_tpl/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_tpl/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_tpl/css/superfish.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_tpl/css/superfish-navbar.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/functions.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/main.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/categories.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/translations.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/hoverIntent.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/links.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/messages.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/overlay.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/superfish.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/supersubs.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/types.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/jquery.fancybox-1.2.6.pack.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_tpl/js/jquery.easing.1.3.js" type="text/javascript"></script>
	{if $editor}
	<script src="{$BASE_URL}js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	{/if}
</head>

<body>
	<div id="wrap">
	<div id="top_nav">
		<a href="{$BASE_URL}">&larr; View site</a>
		{if $isAuthenticated == 1}
		<ul>
			<li class="bold">&bull; &nbsp;&nbsp;<a href="{$BASE_URL_ADMIN}logout/">Logout &rarr;</a></li>
			<li>&bull; &nbsp;&nbsp;<a href="{$BASE_URL_ADMIN}stats/">Stats</a></li>
			<li>&bull; &nbsp;&nbsp;<a href="{$BASE_URL_ADMIN}settings/">Settings</a></li>
			<li><a href="{$BASE_URL_ADMIN}translations/">Translations</a></li>
		</ul>
		{/if}
	</div>
	{if $isAuthenticated == 1}
		{if $smarty.session.status neq ''}
		<div id="status">
		{$smarty.session.status}
		</div><!-- #status -->
		{/if}
	{/if}

	<h1><a href="{$BASE_URL_ADMIN}">{if $smarty.const.SITE_NAME}{$smarty.const.SITE_NAME} | Admin{else}jobberBase Admin{/if}</a></h1>

	{if $isAuthenticated == 1}
		<ul class="sf-menu sf-navbar">
		<li><a {if $CURRENT_PAGE == 'edit-post'}class="selected bold"{else}class="bold"{/if} href="{$BASE_URL_ADMIN}edit-post/">Post a job</a></li>
		<li><a {if $CURRENT_PAGE == 'jobs'}class="selected"{/if} href="{$BASE_URL_ADMIN}{$URL_JOBS}/all/">Active jobs</a>
			<ul>
				<li class="txt">In category: </li>
				{section name=tmp loop=$categories}
				<li id="{$categories[tmp].var_name}"><a href="{$BASE_URL_ADMIN}{$URL_JOBS}/{$categories[tmp].var_name}/">{$categories[tmp].name}</a></li>
				{/section}
			</ul>
		</li>
		<li><a {if $CURRENT_PAGE == ''}class="selected"{/if} href="{$BASE_URL_ADMIN}">Inactive jobs</a></li>
		<li><a {if $CURRENT_PAGE == 'applicants'}class="selected"{/if} href="{$BASE_URL_ADMIN}applicants/">Applicants</a></li>
		<li><a {if $CURRENT_PAGE == 'pages'}class="selected"{/if} href="{$BASE_URL_ADMIN}pages/">Pages</a></li>
		<li><a {if $CURRENT_PAGE == 'cities'}class="selected"{/if} href="{$BASE_URL_ADMIN}cities/list/">Cities</a></li>
		<li><a {if $CURRENT_PAGE == 'categories'}class="selected"{/if} href="{$BASE_URL_ADMIN}categories/">Job categories</a>
		<li><a {if $CURRENT_PAGE == 'types'}class="selected"{/if} href="{$BASE_URL_ADMIN}types/">Job types</a></li>
		<li><a {if $CURRENT_PAGE == 'links'}class="selected"{/if} href="{$BASE_URL_ADMIN}links/">Links</a>
		<ul>
			{foreach from=$menus item=menu name=menus}
			<li><a href="{$BASE_URL_ADMIN}links/{$menu.varname}/">{$menu.name}</a></li>
			{/foreach}
		</ul>
		</li>
		</ul>
	{/if}
