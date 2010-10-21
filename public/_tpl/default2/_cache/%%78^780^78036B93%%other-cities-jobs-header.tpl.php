<?php /* Smarty version 2.6.26, created on 2010-10-14 19:00:55
         compiled from other-cities-jobs-header.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
			<div id="job-listings">
				<?php if ($this->_tpl_vars['jobs']): ?>
				<div id="sort-by-type">
				<?php echo $this->_tpl_vars['translations']['category']['display_only']; ?>
&nbsp;
					<?php unset($this->_sections['job_type']);
$this->_sections['job_type']['name'] = 'job_type';
$this->_sections['job_type']['loop'] = is_array($_loop=$this->_tpl_vars['types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['job_type']['show'] = true;
$this->_sections['job_type']['max'] = $this->_sections['job_type']['loop'];
$this->_sections['job_type']['step'] = 1;
$this->_sections['job_type']['start'] = $this->_sections['job_type']['step'] > 0 ? 0 : $this->_sections['job_type']['loop']-1;
if ($this->_sections['job_type']['show']) {
    $this->_sections['job_type']['total'] = $this->_sections['job_type']['loop'];
    if ($this->_sections['job_type']['total'] == 0)
        $this->_sections['job_type']['show'] = false;
} else
    $this->_sections['job_type']['total'] = 0;
if ($this->_sections['job_type']['show']):

            for ($this->_sections['job_type']['index'] = $this->_sections['job_type']['start'], $this->_sections['job_type']['iteration'] = 1;
                 $this->_sections['job_type']['iteration'] <= $this->_sections['job_type']['total'];
                 $this->_sections['job_type']['index'] += $this->_sections['job_type']['step'], $this->_sections['job_type']['iteration']++):
$this->_sections['job_type']['rownum'] = $this->_sections['job_type']['iteration'];
$this->_sections['job_type']['index_prev'] = $this->_sections['job_type']['index'] - $this->_sections['job_type']['step'];
$this->_sections['job_type']['index_next'] = $this->_sections['job_type']['index'] + $this->_sections['job_type']['step'];
$this->_sections['job_type']['first']      = ($this->_sections['job_type']['iteration'] == 1);
$this->_sections['job_type']['last']       = ($this->_sections['job_type']['iteration'] == $this->_sections['job_type']['total']);
?>
						<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
jobs-in-other-cities/<?php echo $this->_tpl_vars['types'][$this->_sections['job_type']['index']]['var_name']; ?>
/" title="<?php echo $this->_tpl_vars['current_category']; ?>
 <?php echo $this->_tpl_vars['types'][$this->_sections['job_type']['index']]['name']; ?>
"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['types'][$this->_sections['job_type']['index']]['var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['types'][$this->_sections['job_type']['index']]['name']; ?>
" /></a>
					<?php endfor; endif; ?>
				</div><!-- #sort-by-type -->
				<?php endif; ?>
				<h2>
					<?php echo $this->_tpl_vars['translations']['jobscity']['jobs_in_other_cities']; ?>

				</h2>
				<?php if ($this->_tpl_vars['jobs']): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "jobs-list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php else: ?>
					<div id="no-ads">
						<?php echo $this->_tpl_vars['translations']['jobscity']['no_jobs_in_other_cities']; ?>

						<?php if (@ENABLE_NEW_JOBS): ?>
							<br /><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="<?php echo $this->_tpl_vars['translations']['footer']['new_job_title']; ?>
"><?php echo $this->_tpl_vars['translations']['footer']['new_job']; ?>
</a>
						<?php endif; ?>
					</div><!-- #no-ads -->
				<?php endif; ?>
				
			</div><!-- #job-listings -->
		</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>