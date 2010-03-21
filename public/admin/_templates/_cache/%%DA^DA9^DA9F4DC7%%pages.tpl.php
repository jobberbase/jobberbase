<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:53
         compiled from pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'pages.tpl', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="content">
			<h2 id="pages">Pages</h2>
			<p>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/add/" title="Add a new page"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new page" /></a>
			</p>
			<div class="list">
			<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
				<div class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<div class="icons">
						<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['page']['url']; ?>
/" target="_blank" title="View this page"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/edit/<?php echo $this->_tpl_vars['page']['url']; ?>
/" title="Edit this page"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/delete/<?php echo $this->_tpl_vars['page']['url']; ?>
/" title="Delete this page" onclick="if(!confirm('Are you sure you want to delete this page?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
					</div>
					<?php echo $this->_tpl_vars['page']['page_title']; ?>
 - <?php echo $this->_tpl_vars['page']['title']; ?>

				</div>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			<p>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/add/" title="Add a new page"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new page" /></a>
			</p>
		</div><!-- #content -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>