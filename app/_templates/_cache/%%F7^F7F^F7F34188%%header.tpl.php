<?php /* Smarty version 2.6.10, created on 2007-10-29 19:57:57
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $this->_tpl_vars['html_title']; ?>
</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
	<meta name="author" content="Filip Cherecheş-Toşa (http://www.filipcte.ro)" />
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
favicon.ico" type="image/x-icon" />
	<?php if ($this->_tpl_vars['CURRENT_PAGE'] == '' || $this->_tpl_vars['CURRENT_PAGE'] != 'jobs'): ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/all/" />
	<?php else: ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/<?php echo $this->_tpl_vars['current_category']; ?>
/" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
css/print.css" media="print" type="text/css" />
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.js" type="text/javascript"></script>
	<!--[if !IE]><script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.history.js" type="text/javascript"></script><![endif]-->
 	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.form.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/cmxforms.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.metadata.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.validate.pack.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/interface.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/functions.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/browser_detect.js" type="text/javascript"></script>
</head>

<body>
	<div id="container">
		<?php if ($_SESSION['status'] != ''): ?>
			<div id="status">
				<?php echo $_SESSION['status']; ?>

			</div><!-- #status -->
		<?php endif; ?>
		<div id="header">
			<h1 id="logo"><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
" title="IT jobs">jobber</a></h1>
			<ul id="top">
				<li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
widgets/" title="widgets">widgets</a></li>
				<li>&bull;</li>
				<li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
about/" title="about us">about</a></li>
				<li>&bull;</li>
				<li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
contact/" title="contact us" ><strong>contact</strong></a></li>
			</ul>
			<div id="the_feed">
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/all/" title="subscribe to the RSS feed"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/bt-rss.png" alt="RSS" /></a>
			</div>
		</div><!-- #header -->
		
		<div id="box">
			<div id="search">
				<form id="search_form" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
search/">
					<fieldset>
						<input type="text" name="keywords" id="keywords" maxlength="30" <?php if ($this->_tpl_vars['keywords']): ?>value="<?php echo $this->_tpl_vars['keywords']; ?>
"<?php else: ?>value="search for a job"<?php endif; ?> />
						<span id="indicator" style="display: none;"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/ajax-loader.gif" alt="" /></span>
						<label class="suggestionTop">(e.g. &quot;ajax&quot;, &quot;designer, london&quot;, &quot;php, chicago&quot;)</label>
					</fieldset>
				</form>
			</div><!-- #search -->
			<div class="addJob">
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="Post a new job" class="add">Post a new job</a>
			</div><!-- .addJob -->
		</div><!-- #box -->
		
    <div id="categs-nav">
      <ul>
				<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
        <li id="<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
" <?php if ($this->_tpl_vars['current_category'] == $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']): ?>class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
jobs/<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
/" title="<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
"><span><?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['name']; ?>
</span><span class="cnr">&nbsp;</span></a></li>
				<?php endfor; endif; ?>
    	</ul>
		</div><!-- #categs-nav -->
		<div class="clear"></div>
		
		<div id="sidebar">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div><!-- #sidebar -->