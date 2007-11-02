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
	<link rel="stylesheet" href="{$BASE_URL}css/print.css" media="print" type="text/css" />
	<script src="{$BASE_URL}js/jquery.js" type="text/javascript"></script>
	<!--[if !IE]><script src="{$BASE_URL}js/jquery.history.js" type="text/javascript"></script><![endif]-->
 	<script src="{$BASE_URL}js/jquery.form.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/cmxforms.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/jquery.metadata.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/jquery.validate.pack.js" type="text/javascript" charset="iso-8859-1"></script>
	<script src="{$BASE_URL}js/interface.js" type="text/javascript"></script>
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
			<h1 id="logo"><a href="{$BASE_URL}" title="IT jobs">jobber</a></h1>
			<ul id="top">
				<li><a href="{$BASE_URL}widgets/" title="widgets">widgets</a></li>
				<li>&bull;</li>
				<li><a href="{$BASE_URL}about/" title="about us">about</a></li>
				<li>&bull;</li>
				<li><a href="{$BASE_URL}contact/" title="contact us" ><strong>contact</strong></a></li>
			</ul>
			<div id="the_feed">
				<a href="{$BASE_URL}rss/all/" title="subscribe to the RSS feed"><img src="{$BASE_URL}img/bt-rss.png" alt="RSS" /></a>
			</div>
		</div><!-- #header -->
		
		<div id="box">
			<div id="search">
				<form id="search_form" method="post" action="{$BASE_URL}search/">
					<fieldset>
						<input type="text" name="keywords" id="keywords" maxlength="30" {if $keywords}value="{$keywords}"{else}value="search for a job"{/if} />
						<span id="indicator" style="display: none;"><img src="{$BASE_URL}img/ajax-loader.gif" alt="" /></span>
						<label class="suggestionTop">(e.g. &quot;ajax&quot;, &quot;designer, london&quot;, &quot;php, chicago&quot;)</label>
					</fieldset>
				</form>
			</div><!-- #search -->
			<div class="addJob">
				<a href="{$BASE_URL}post/" title="Post a new job" class="add">Post a new job</a>
			</div><!-- .addJob -->
		</div><!-- #box -->
		
    <div id="categs-nav">
      <ul>
				{section name=tmp loop=$categories}
        <li id="{$categories[tmp].var_name}" {if $current_category == $categories[tmp].var_name}class="selected"{/if}><a href="{$BASE_URL}jobs/{$categories[tmp].var_name}/" title="{$categories[tmp].var_name}"><span>{$categories[tmp].name}</span><span class="cnr">&nbsp;</span></a></li>
				{/section}
    	</ul>
		</div><!-- #categs-nav -->
		<div class="clear"></div>
		
		<div id="sidebar">
			{include file="sidebar.tpl"}
		</div><!-- #sidebar -->