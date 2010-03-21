<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:19
         compiled from job.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
		<br />
		<a href="<?php echo $this->_tpl_vars['back_link']; ?>
" title="home">&laquo; go back</a><br />
		
			<div id="job-listings"></div><!-- #job-listings -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "job-details.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] == $this->_tpl_vars['URL_JOB']): ?>
			<div id="job-bottom">
				<div id="job-post-utils">
				
				</div><!-- #job-post-utils -->
				<div id="number-views">
					Published at <strong><?php echo $this->_tpl_vars['job']['created_on']; ?>
</strong><br />
					Viewed: <strong><?php echo $this->_tpl_vars['job']['views_count']; ?>
</strong> times
				</div><!-- #number-views -->
				<div class="clear"></div>
			</div><!-- #job-bottom -->
			<div id="send-to-friend" style="display: none;">
				
			</div><!-- #send-to-friend -->
			
			<?php endif; ?>
		</div><!-- /content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>