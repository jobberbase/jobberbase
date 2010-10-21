<?php /* Smarty version 2.6.26, created on 2010-10-15 08:46:49
         compiled from company-posts-loop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'company-posts-loop.tpl', 6, false),)), $this); ?>
<!-- Jobs from the same company -->
<?php if (count ( $this->_tpl_vars['compjobs'] ) > 1): ?>
<strong><?php echo $this->_tpl_vars['translations']['jobs']['recent_jobs']; ?>
 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS_AT_COMPANY']; ?>
/<?php echo $this->_tpl_vars['jobsat']; ?>
/"><?php echo $this->_tpl_vars['job']['company']; ?>
</a></strong><br />
<?php $_from = $this->_tpl_vars['compjobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['compjob']):
?>
<?php if ($this->_tpl_vars['compjob']['id'] != $this->_tpl_vars['job']['id']): ?>
	<div class="<?php echo smarty_function_cycle(array('values' => 'row,row-alt'), $this);?>
">
		<span class="row-info">
			<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['compjob']['type_var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['compjob']['type_name']; ?>
" />
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOB']; ?>
/<?php echo $this->_tpl_vars['compjob']['id']; ?>
/<?php echo $this->_tpl_vars['compjob']['url_title']; ?>
/" title="<?php echo $this->_tpl_vars['compjob']['title']; ?>
"><?php echo $this->_tpl_vars['compjob']['title']; ?>
</a> <span class="la"><?php echo $this->_tpl_vars['translations']['homepage']['at']; ?>
</span> <?php echo $this->_tpl_vars['compjob']['company']; ?>
<?php if ($this->_tpl_vars['compjob']['is_location_anywhere']): ?>, <?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
<?php else: ?> <span class="la"><?php echo $this->_tpl_vars['translations']['homepage']['in']; ?>
</span> <?php echo $this->_tpl_vars['compjob']['location']; ?>
<?php endif; ?>
		</span>
		<span class="time-posted"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/clock.gif" alt="" /> <?php echo $this->_tpl_vars['compjob']['created_on']; ?>
</span>			
	</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<br />
<?php endif; ?>
<!-- Jobs from the same company -->