<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:35
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
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
 
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.bgiframe.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/functions.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/main.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/categories.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/hoverIntent.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/links.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/messages.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/overlay.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/superfish.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/supersubs.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/types.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.fancybox-1.2.6.pack.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<?php if ($this->_tpl_vars['editor']): ?>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/editor.js" type="text/javascript"></script>
	<script type="text/javascript">
	<?php echo '
	 tinyMCE_GZ.init({
	 plugins : \'style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras\',
	 themes : \'advanced\',
	 languages : \'en\',
	 disk_cache : true,
	 debug : false
	 });
	'; ?>

	</script>
	<?php endif; ?>
	<script type="text/javascript">
	 Jobber.I18n = <?php echo $this->_tpl_vars['translationsJson']; ?>
;
	</script>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/superfish.css" /> 
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/superfish-navbar.css" />  
	<?php echo '
	<script type="text/javascript"> 
	 $(document).ready(function(){ 
	 $("ul.sf-menu").superfish({ 
	 animation: {height:\'show\'},
	 delay:     500
	 }); 
	 }); 
	</script>
	'; ?>

</head>

<body>
	<div id="wrap">
	<div id="top_nav">
	 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">&larr; Back to site</a>
	 <?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
	 <span class="version"><a href="http://www.jobberbase.com/" title="Open source job board software">Jobberbase</a> <?php echo @JOBBERBASE_VERSION; ?>
</span>
	 <?php else: ?>

	 <?php endif; ?>
	</div>
	<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
	 <?php if ($_SESSION['status'] != ''): ?>
	 <div id="status">
	 <?php echo $_SESSION['status']; ?>

	 </div><!-- #status -->
	 <?php endif; ?>
	<?php endif; ?>

	 <h1>Jobberbase Administration</h1>

	<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
	 <ul class="sf-menu sf-navbar">
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Home</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'edit-post'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-post/">Post a job</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'pages'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/">Pages</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'categories'): ?>class="selected"<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'jobs'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
categories/">Categories</a>
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
"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
/"><?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['name']; ?>
</a></li>
	 <?php endfor; endif; ?>
	    	  </ul>
	 </li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'stats'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
stats/">Stats</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'cities'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/list/">Cities</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'types'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
types/">Job types</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'links'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/">Links</a>
	 <ul>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/primary/">Primary Menu</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/secondary/">Secondary Menu</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer1/">Footer Column 1</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer2/">Footer Column 2</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer3/">Footer Column 3</a></li>
	 </ul>
	 </li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">Settings</a>
	 <ul>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/main/">Main Settings</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/search-and-pagination/">Search & Pagination Settings</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/url-rewrite/">URl Rewrite Settings</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/anti-spam/">Spam Settings</a></li>
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/mail/">Mailer Settings</a></li>
	 </ul>
	 </li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">Change password</a></li>
	 <li class="right bold"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">Logout</a></li>
	 </ul>
	
	<a style="float: right" class="iframe" href="http://www.evertsemeijn.nl/help/administration/<?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>home/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'edit-post'): ?>post-a-job/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'pages'): ?>pages/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'categories'): ?>categories/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'jobs'): ?>categories/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'stats'): ?>stats/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'cities'): ?>cities/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'types'): ?>job-types/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'links'): ?>links/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>settings/<?php endif; ?><?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>change-password/<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/help.png" /></a>
	
	<?php endif; ?>