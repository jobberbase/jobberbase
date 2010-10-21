<?php /* Smarty version 2.6.26, created on 2010-10-15 09:15:32
         compiled from jobs-list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'jobs-list.tpl', 2, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
	<div class="<?php echo smarty_function_cycle(array('values' => 'row,row-alt'), $this);?>
">
		<span class="row-info">
			<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['job']['type_var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['job']['type_name']; ?>
" />
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOB']; ?>
/<?php echo $this->_tpl_vars['job']['id']; ?>
/<?php echo $this->_tpl_vars['job']['url_title']; ?>
/" title="<?php echo $this->_tpl_vars['job']['title']; ?>
"><?php echo $this->_tpl_vars['job']['title']; ?>
</a> <span class="la"><?php echo $this->_tpl_vars['translations']['homepage']['at']; ?>
</span> <?php echo $this->_tpl_vars['job']['company']; ?>
<?php if ($this->_tpl_vars['job']['is_location_anywhere']): ?>, <?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
<?php else: ?> <span class="la"><?php echo $this->_tpl_vars['translations']['homepage']['in']; ?>
</span> <?php echo $this->_tpl_vars['job']['location']; ?>
<?php endif; ?>
		</span>
		<span class="time-posted"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/clock.gif" alt="" /> <?php echo $this->_tpl_vars['job']['created_on']; ?>
</span>			
	</div>
<?php endforeach; endif; unset($_from); ?>
<br/>
<?php echo $this->_tpl_vars['pages']; ?>