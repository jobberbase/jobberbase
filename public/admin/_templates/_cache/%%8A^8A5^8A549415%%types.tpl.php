<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:32
         compiled from types.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="content">
				<h2 id="job_types">Job Types</h2>
				
				<div class="information">The icon has to be named <em>icon_varname.png</em> (replace varname with the varname of the corresponding jobtype) and has to be uploaded to <strong><?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/</strong>.</div>
				
				<div id="typesContainer">
				<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
					<div class="typeItem" rel="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp']['index']]->getId(); ?>
">
						<div class="typeHandle"></div>
						<div class="typeWrapper">
							<a href="#" title="Delete job type" class="deleteType"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
							<label><span>Name:</span><input type="text" size="50" name="name[<?php echo $this->_tpl_vars['types'][$this->_sections['tmp']['index']]->getId(); ?>
]" value="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp']['index']]->getName(); ?>
" /><img class="help" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/information-balloon.png" title="The name that will be used in the template" /></label>
							<a href="#" title="Save changes" class="saveType"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/disk.png" alt="Delete" /></a>
							<label><span>Var name:</span><input type="text" size="50" id="nr" name="var_name[<?php echo $this->_tpl_vars['types'][$this->_sections['tmp']['index']]->getId(); ?>
]" value="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp']['index']]->getVarName(); ?>
" /><img class="help" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/information-balloon.png" title="Var name must not contain spaces or other special chars" /></label>
						</div>
					</div>
				<?php endfor; endif; ?>
				</div>
				<p></p>
				<p>
					<a href="#" title="Add new type"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new job type" /></a></p>
		</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>