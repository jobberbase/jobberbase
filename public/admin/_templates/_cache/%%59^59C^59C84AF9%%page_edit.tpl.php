<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:57
         compiled from page_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">
	<h2 id="pages">Pages - <em><?php if ($this->_tpl_vars['current_page']): ?>&quot;<?php echo $this->_tpl_vars['current_page']['title']; ?>
&quot;<?php else: ?>New page<?php endif; ?></em></h2>
	
	<?php if ($this->_tpl_vars['errors']): ?>
	<div class="fail">
		Please check for errors
	</div>
	<?php endif; ?>
	
	<form id="publish_form" class="add_page" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
		<div class="left span2 block">
			<h3>Page content</h3>
			<div class="block_inner">
				<div class="group<?php if ($this->_tpl_vars['errors']['page_title']): ?> error<?php endif; ?>">
					<label for="page_title">Page Heading</label>
					<input type="text" name="page_title" id="page_title" class="text_field" size="35" value="<?php echo $this->_tpl_vars['defaults']['page_title']; ?>
" />
					<?php if ($this->_tpl_vars['errors']['page_title']): ?><span class="suggestion"><?php echo $this->_tpl_vars['errors']['page_title']; ?>
</span><?php endif; ?>
				</div>
				<div class="group">
					<label for="page_content">Content</label>
					<textarea id="page_content" name="page_content" class="textarea_field mceEditor" cols="85" rows="25"><?php echo $this->_tpl_vars['defaults']['page_content']; ?>
</textarea>
				</div>
				<div class="group">
					<label><input type="checkbox" id="page_has_form" name="page_has_form" value="1"<?php if ($this->_tpl_vars['defaults']['page_has_form'] == '1'): ?> checked="checked"<?php endif; ?> /> Add a contact form?</label>
					<?php if ($this->_tpl_vars['defaults']['page_has_form'] != '1'): ?><div class="suggestion">You can change the feedback message after you save the page</div><?php endif; ?>
					<div <?php if ($this->_tpl_vars['defaults']['page_has_form'] != '1'): ?> class="hidden"<?php endif; ?>>
						<label for="page_form_message">Form message</label></div>
					<div <?php if ($this->_tpl_vars['defaults']['page_has_form'] != '1'): ?> class="hidden"<?php endif; ?>>
						<textarea id="page_form_message" name="page_form_message" class="textarea_field mceEditor" cols="85" rows="10"><?php echo $this->_tpl_vars['defaults']['page_form_message']; ?>
</textarea>
					</div>
				</div>
				<div class="group_submit">
					<button type="submit"><span><?php if ($this->_tpl_vars['current_page']): ?>Save changes<?php else: ?>Save page<?php endif; ?></span></button>
				</div>
			</div>
		</div>

		<div class="right span1">
			<div class="block mb2">
				<h3>Search Engine Optimisation</h3>
				<div class="block_inner">
					<div class="group<?php if ($this->_tpl_vars['errors']['page_url']): ?> error<?php endif; ?>">
						<label for="page_url">URL</label>
						<input type="text" name="page_url" id="page_url" size="32" value="<?php echo $this->_tpl_vars['defaults']['page_url']; ?>
" />
						<?php if ($this->_tpl_vars['errors']['page_url']): ?><span class="suggestion"><?php echo $this->_tpl_vars['errors']['page_url']; ?>
</span><?php endif; ?>
					</div>
					<div class="group<?php if ($this->_tpl_vars['errors']['page_page_title']): ?> error<?php endif; ?>">
						<label for="page_page_title">Page title</label>
						<input type="text" name="page_page_title" id="page_page_title" size="32" value="<?php echo $this->_tpl_vars['defaults']['page_page_title']; ?>
" />
					</div>
					<div class="group">
						<label for="page_keywords">Keywords</label>
						<textarea id="page_description" name="page_description" rows="6" cols="30"><?php echo $this->_tpl_vars['defaults']['page_description']; ?>
</textarea>
					</div>
					<div class="group">
						<label for="page_description">Description</label>
						<textarea id="page_keywords" name="page_keywords" rows="6" cols="30"><?php echo $this->_tpl_vars['defaults']['page_keywords']; ?>
</textarea>
					</div>
					<div class="group_submit">
						<button type="submit"><span><?php if ($this->_tpl_vars['current_page']): ?>Save changes<?php else: ?>Save page<?php endif; ?></span></button>
					</div>
				</div>
			</div>
			<div class="block mb2">
				<h3>Links</h3>
				<div class="block_inner">
					<p>Make a selection in the editor or select an existing link and click on one of the links bellow.</p>
					<dl id="links_list">
						<dt><strong>Internal</strong></dt>
							<dd><a href="#" rel="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/">Post a job</a></dd>
							<dd><a href="#" rel="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/">RSS Feed</a></dd>
							<dd><a href="#" rel="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_COMPANIES']; ?>
/">Companies</a></dd>
						<dt><strong>Categories</strong></dt>
							<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<dd><a href="#" rel="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
/"><?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['name']; ?>
</a></dd>
							<?php endfor; endif; ?>
						<dt><strong>Pages</strong></dt>
							<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
							<dd><a href="#" rel="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/<?php echo $this->_tpl_vars['page']['url']; ?>
/"><?php echo $this->_tpl_vars['page']['title']; ?>
</a></dd>
							<?php endforeach; endif; unset($_from); ?>
					</dl>
				</div>
			</div>
		</div>
	</form>
</div><!-- #content -->
<?php echo '
	<script type="text/javascript">
		jobberBase.editor();
	</script>
'; ?>

<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#page_title\').focus();
				
				$("#publish_form").validate({
					rules: {
						page_title: { required: true },
						page_content: { required: true },
						page_url: { required: true },
						page_page_title: { required: true }
					},
					messages: {
						page_title: \'\',
						page_content: \'\',
						page_url: \'\',
						page_page_title: \'\'
					}
				});
			});
		</script>
		'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>