<?php /* Smarty version 2.6.26, created on 2010-02-06 13:54:54
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'home.tpl', 20, false),)), $this); ?>
<?php if ($this->_tpl_vars['spotlight_jobs']): ?>
	<h2><?php echo $this->_tpl_vars['translations']['homepage']['spotlight_jobs']; ?>
</h2>
	
	<?php $_from = $this->_tpl_vars['spotlight_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
		<div class="row-spot">
			<span class="row-info">
				<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
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
			<span class="spotlight-image"></span>
		</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['latest_jobs']): ?>
	<br />
	<h2><?php echo $this->_tpl_vars['translations']['homepage']['recent_jobs']; ?>
</h2>
	
	<?php $_from = $this->_tpl_vars['latest_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
		<div class="<?php echo smarty_function_cycle(array('values' => 'row,row-alt'), $this);?>
">
			<span class="row-info">
				<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
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
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/clock.gif" alt="" /> <?php echo $this->_tpl_vars['job']['created_on']; ?>
</span>
		</div>
	<?php endforeach; endif; unset($_from); ?>
	
	<div id="view_all">
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/"><?php echo $this->_tpl_vars['translations']['homepage']['view_all_jobs']; ?>
</a>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['most_applied_to_jobs']): ?>
	<br />
	<h2><?php echo $this->_tpl_vars['translations']['homepage']['popular_jobs']; ?>
</h2>
	
	<?php $_from = $this->_tpl_vars['most_applied_to_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
		<div class="<?php echo smarty_function_cycle(array('values' => 'row,row-alt'), $this);?>
">
			<span class="row-info">
				<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
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
			<span class="time-posted"><strong><?php echo $this->_tpl_vars['job']['apps']; ?>
</strong> <?php echo $this->_tpl_vars['translations']['homepage']['applicants']; ?>
</span>			
		</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['latest_jobs'] && ! $this->_tpl_vars['most_applied_to_jobs']): ?>
	<br />
	<p>
		<?php echo $this->_tpl_vars['translations']['homepage']['no_jobs']; ?>
.<br />
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="<?php echo $this->_tpl_vars['translations']['footer']['new_job_title']; ?>
"><?php echo $this->_tpl_vars['translations']['footer']['new_job']; ?>
</a>?
	</p>
<?php endif; ?>