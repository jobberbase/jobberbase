<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:39
         compiled from posts-loop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'posts-loop.tpl', 6, false),)), $this); ?>
<?php if ($this->_tpl_vars['jobs']): ?>

<div class="list">

<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmp']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['job']):
        $this->_foreach['tmp']['iteration']++;
?>
	<div id="item<?php echo $this->_tpl_vars['job']['id']; ?>
" class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
		<div class="icons">
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-post/<?php echo $this->_tpl_vars['job']['id']; ?>
/" title="Edit this job"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="edit" /></a>
			<?php if ($this->_tpl_vars['job']['is_spotlight'] == 0): ?>
				<a id="activateSpotlight<?php echo $this->_tpl_vars['job']['id']; ?>
" href="javascript:void(0);" onclick="Jobber.SpotlightActivate('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
activate-spotlight/', <?php echo $this->_tpl_vars['job']['id']; ?>
, <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>1<?php else: ?>0<?php endif; ?>);" title="Turn spotlight on"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/star_on.png" alt="activate" /></a>
			<?php else: ?>
				<a id="deactivateSpotlight<?php echo $this->_tpl_vars['job']['id']; ?>
" href="javascript:void(0);" onclick="Jobber.SpotlightDeactivate('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
deactivate-spotlight/', <?php echo $this->_tpl_vars['job']['id']; ?>
);" title="Turn spotlight on"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/star_off.png" alt="deactivate" /></a>
			<?php endif; ?>&nbsp;
			<?php if ($this->_tpl_vars['job']['is_active'] == 0): ?>
				<a id="activateLink<?php echo $this->_tpl_vars['job']['id']; ?>
" href="javascript:void(0);" onclick="Jobber.Activate('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
activate/', <?php echo $this->_tpl_vars['job']['id']; ?>
, <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>1<?php else: ?>0<?php endif; ?>);" title="Active this job"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/switch_off.png" alt="activate" /></a>
			<?php else: ?>
				<a id="deactivateLink<?php echo $this->_tpl_vars['job']['id']; ?>
" href="javascript:void(0);" onclick="Jobber.Deactivate('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
deactivate/', <?php echo $this->_tpl_vars['job']['id']; ?>
);" title="Deactive this job"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/switch.png" alt="deactivate" /></a>
			<?php endif; ?>&nbsp;
				<a href="javascript:void(0);" onclick="Jobber.Delete('<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
delete/', <?php echo $this->_tpl_vars['job']['id']; ?>
);" title="Delete this job"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="delete" /></a>
		</div>
		<div class="time"><?php echo $this->_tpl_vars['job']['created_on']; ?>
</div>

		<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['job']['type_var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['job']['type_name']; ?>
" />
		<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['URL_JOB']; ?>
/<?php echo $this->_tpl_vars['job']['id']; ?>
/<?php echo $this->_tpl_vars['job']['url_title']; ?>
/" title="<?php echo $this->_tpl_vars['job']['title']; ?>
"><?php echo $this->_tpl_vars['job']['title']; ?>
</a> <span class="light">at</span> <?php echo $this->_tpl_vars['job']['company']; ?>
<?php if ($this->_tpl_vars['job']['is_location_anywhere']): ?>, <?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
<?php else: ?> <span class="light">in</span> <?php echo $this->_tpl_vars['job']['location']; ?>
<?php endif; ?>
		<div>viewed <?php echo $this->_tpl_vars['job']['views_count']; ?>
 times<?php if ($this->_tpl_vars['statisticalData'][$this->_tpl_vars['job']['id']]): ?>, <?php echo $this->_tpl_vars['statisticalData'][$this->_tpl_vars['job']['id']]['numberOfApplications']; ?>
 applicants, last application on <?php echo $this->_tpl_vars['statisticalData'][$this->_tpl_vars['job']['id']]['lastApplicationOn']; ?>
<?php endif; ?></div>
	</div>
<?php endforeach; endif; unset($_from); ?>
</div>

<div class="pagination"><?php echo $this->_tpl_vars['pages']; ?>
</div>

<?php else: ?>
	<div id="no-ads">
		No jobs, yet.
	</div>
<?php endif; ?>