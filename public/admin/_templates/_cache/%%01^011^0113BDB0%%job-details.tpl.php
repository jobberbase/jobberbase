<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:19
         compiled from job-details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'highlight_keywords', 'job-details.tpl', 35, false),)), $this); ?>
			<div id="job-details">
				
				<?php if ($this->_tpl_vars['job']['days_old'] > 40): ?>
				<div id="old-ad">
					This job ad has been posted over 40 days ago...
				</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['CURRENT_PAGE'] == $this->_tpl_vars['URL_JOB']): ?>
				<div id="applied-to-job">
					<?php echo $this->_tpl_vars['job']['applied_count']; ?>

					<?php if ($this->_tpl_vars['job']['applied_count'] != 1): ?>
					<p>applicants</p>
					<?php else: ?>
					<p>applicant</p>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<h2>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['job']['type_var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['job']['type_name']; ?>
" /> <?php echo $this->_tpl_vars['job']['title']; ?>
 
				</h2>
				<p>
					<span class="fading">at</span>
					<?php if ($this->_tpl_vars['job']['url'] && $this->_tpl_vars['job']['url'] != 'http://'): ?>
					<a href="<?php echo $this->_tpl_vars['job']['url']; ?>
"><?php echo $this->_tpl_vars['job']['company']; ?>
</a>
					<?php else: ?>
					<strong><?php echo $this->_tpl_vars['job']['company']; ?>
</strong>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['job']['is_location_anywhere']): ?>
					<strong>(<?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
)</strong>
					<?php else: ?>
					<span class="fading">in</span> <strong><?php echo $this->_tpl_vars['job']['location']; ?>
</strong>
					<?php endif; ?>
				</p>
				<div id="job-description">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['description'])) ? $this->_run_mod_handler('highlight_keywords', true, $_tmp, $_SESSION['keywords_array']) : smarty_modifier_highlight_keywords($_tmp, $_SESSION['keywords_array'])); ?>

				</div><br />
				
			</div><!-- #job-details -->