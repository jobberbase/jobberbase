<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:41
         compiled from links.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="content">
	<?php if ($this->_tpl_vars['links'] == ''): ?>
		<h2 id="links">Navigation Links</h2>
		
		<div class="information">If you want to hide a menu from the frontend simply remove all links from the corresponding menu. It could be that some links are hardcoded. You'll have to edit the template files to remove those links.</div>
		
		<div class="list">
			<div class="row odd">
				<a class="right" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/primary/" title="Edit main menu"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
				<h4 class="bold mb05">Primary menu</h4>
				<div>The primary menu for your Jobberbase theme. By default this menu is located at the top.</div>
			</div>
			<div class="row even">
				<a class="right" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/secondary/" title="Edit secondary menu"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
				<h4 class="bold mb05">Secondary menu</h4>
				<div>The secondary menu for your Jobberbase theme. By default this menu is located in the sidebar</div>
			</div>
			<div class="row odd">
				<a class="right" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer1/" title="Edit footer menu 1"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
				<h4 class="bold mb05">Footer menu 1</h4>
				<div>The default footer holds 3 columns. This is for the first column</div>
			</div>
			<div class="row even">
				<a class="right" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer2/" title="Edit footer menu 2"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
				<h4 class="bold mb05">Footer menu 2</h4>
				<div>The default footer holds 3 columns. This is for the second column</div>
			</div>
			<div class="row odd">
				<a class="right" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer3/" title="Edit footer menu 3"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
				<h4 class="bold mb05">Footer menu 3</h4>
				<div>The default footer holds 3 columns. This is for the third column</div>
			</div>
		</div>

	<?php else: ?>

		<h2 id="links"><?php echo $this->_tpl_vars['menu_name']; ?>
</h2>
		<div id="linksContainer">
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
			<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<div class="linkItem" rel="<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['id']; ?>
">
				<div class="linkHandle"></div>
				<div class="linkWrapper">
					<a href="#" title="Delete this link" class="deleteLink"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
					<label><span>Name:</span><input type="text" size="60" name="name<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['name']; ?>
" /><img class="help" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/information-balloon.png" title="The text you want to display in the frontend" /></label>
					<a href="#" title="Save changes" class="saveLink" style="display: none;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/disk.png" alt="Save" /></a>
					<label><span>Url:</span><input type="text" size="60" name="url<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['url']; ?>
" /><img class="help" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/information-balloon.png" title="The URL you want to link to. When you want to link to a Jobberbase page (e.g. the page Contact) you can use the Jobberbase URL (e.g. contact)" /></label>
					<label><span>Title:</span><input type="text" size="60" name="title<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['menu'][$this->_sections['tmp']['index']]['title']; ?>
" /><img class="help" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/information-balloon.png" title="Text that shows when you hover over the link, just like this help message. You can leave this blank if you don't want to show anything" /></label>
					</label>
				</div>
			</div>
			<?php endfor; endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</div>
		<p></p>
		<p><a href="#" title="Add new link"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new link" /></a></p>

	<?php endif; ?>
	</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>