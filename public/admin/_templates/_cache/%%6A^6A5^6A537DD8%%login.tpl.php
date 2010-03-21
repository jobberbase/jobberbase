<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:35
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['incorrect']): ?>
		<div class="fail"><?php echo $this->_tpl_vars['errors']['incorrect']; ?>
</div>
	<?php endif; ?>

<div id="container_login">
	<div class="block">
	<form id="login" method="post" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">
		<h3>Log into Jobberbase</h3>
		<div class="block_inner">
			<div class="group<?php if ($this->_tpl_vars['errors']['username']): ?> error<?php endif; ?>">
				<input type="text" name="username" id="username" size="20" value="<?php echo $_POST['username']; ?>
" />
				<?php if ($this->_tpl_vars['errors']['username']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['username']; ?>
</div><?php endif; ?>
			</div>
			<div class="group<?php if ($this->_tpl_vars['errors']['password']): ?> error<?php endif; ?>">
				<input type="password" name="password" id="password" size="20"	value="" />
				<?php if ($this->_tpl_vars['errors']['password']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['password']; ?>
</div><?php endif; ?>
			</div>
			<div class="group_submit">
				<button type="submit" name="submit" id="submit"><span>Login</span></button>
				<input type="hidden" name="action" value="login" />
			</div>
		</div>
	</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>