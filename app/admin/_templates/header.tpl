<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>{$html_title}</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="{$meta_description}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<meta name="author" content="Filip Cherecheş-Toşa (http://www.filipcte.ro)" />
	<link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" />
	{if $CURRENT_PAGE == '' || $CURRENT_PAGE != 'jobs'}
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$BASE_URL}rss/all/" />
	{else}
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$BASE_URL}rss/{$current_category}/" />
	{/if}
	<link rel="stylesheet" href="{$BASE_URL}css/screen.css" type="text/css" media="screen" />
	<script src="{$BASE_URL}js/jquery.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/functions.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/browser_detect.js" type="text/javascript"></script>
</head>

<body>
	<div id="container">
		{if $smarty.session.status neq ''}
			<div id="status">
				{$smarty.session.status}
			</div><!-- #status -->
		{/if}
		<div id="header">
			<h1 id="logo"><a href="{$BASE_URL_ADMIN}home/" title="IT jobs">jobber</a></h1>
			
		</div><!-- #header -->
		
    <div id="categs-nav">
    	{if $isAuthenticated == 1}
     		 <ul>
				{section name=tmp loop=$categories}
       		<li id="{$categories[tmp].var_name}" {if $current_category == $categories[tmp].var_name}class="selected"{/if}><a href="{$BASE_URL_ADMIN}jobs/{$categories[tmp].var_name}/" title="{$categories[tmp].var_name}"><span>{$categories[tmp].name}</span><span class="cnr">&nbsp;</span></a></li>
				{/section}
    		 </ul>
    	{/if}
		</div><!-- #categs-nav -->
		<div class="clear"></div>
		
		<div id="sidebar">
			{if $isAuthenticated == 1}
				<a href="{$BASE_URL_ADMIN}logout/">Logout &raquo;</a>
			{/if}
		</div><!-- #sidebar -->