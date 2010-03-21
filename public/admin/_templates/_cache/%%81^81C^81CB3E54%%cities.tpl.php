<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:23
         compiled from cities.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'cities.tpl', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="content">
			<h2 id="cities">Cities</h2>
			<p><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/prepare-add/" title="Add a new city"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new city" /></a></p>
			<div class="list">
				<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
				<div class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
" id="item<?php echo $this->_tpl_vars['city']['id']; ?>
">
					<div class="icons">
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/prepare-edit/<?php echo $this->_tpl_vars['city']['id']; ?>
/" title="Edit this city"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
						<a href="javascript:void(0);" title="Delete this city" onclick="jobberBase.deleteCity('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/delete/', <?php echo $this->_tpl_vars['city']['id']; ?>
)"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
					</div>
					<strong><?php echo $this->_tpl_vars['city']['name']; ?>
</strong> (<?php echo $this->_tpl_vars['city']['ascii_name']; ?>
)
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<p><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/prepare-add/" title="Add a new city"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new city" /></a></p>
		</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>