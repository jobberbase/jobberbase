<?php /* Smarty version 2.6.26, created on 2010-10-15 09:15:34
         compiled from posts-loop.tpl */ ?>
<?php if ($this->_tpl_vars['is_home'] == 1): ?>
	<div><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">&laquo; home</a></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['no_categ'] != 1): ?>
	<?php if ($this->_tpl_vars['keywords']): ?>
		Search results for <strong><?php echo $this->_tpl_vars['keywords']; ?>
</strong>:
	<?php endif; ?>
	<?php if ($this->_tpl_vars['jobs']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "jobs-list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
		<div id="no-ads">
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] != 'search'): ?>
				<?php echo $this->_tpl_vars['translations']['jobs']['no_job']; ?>
 <strong><?php echo $this->_tpl_vars['current_category_name']; ?>
</strong>.
				<?php if (@ENABLE_NEW_JOBS): ?>
					<br /><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="<?php echo $this->_tpl_vars['translations']['footer']['new_job_title']; ?>
"><?php echo $this->_tpl_vars['translations']['footer']['new_job']; ?>
</a>
				<?php endif; ?>
			<?php else: ?>
				<?php echo $this->_tpl_vars['translations']['jobs']['no_job_found']; ?>
<br />
			<?php endif; ?>
		</div><!-- #no-ads -->
	<?php endif; ?>
<?php endif; ?>