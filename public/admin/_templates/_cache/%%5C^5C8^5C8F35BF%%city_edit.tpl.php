<?php /* Smarty version 2.6.26, created on 2010-02-06 13:57:27
         compiled from city_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="content">
		<h2 id="cities">Cities - <em><?php if ($this->_tpl_vars['action'] == 'add'): ?>New city<?php else: ?>"Edit <?php echo $this->_tpl_vars['city']['name']; ?>
"<?php endif; ?></em></h2>
		<form id="city_form" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/<?php if ($this->_tpl_vars['action'] == 'add'): ?>add/<?php else: ?>edit/<?php endif; ?>" method="post">
			<div class="clearfix">
				<div class="left span2 block">
					<h3><?php if ($this->_tpl_vars['action'] == 'add'): ?>New city<?php else: ?>Edit <?php echo $this->_tpl_vars['city']['name']; ?>
<?php endif; ?></h3>
					<div class="block_inner">
						<div class="group<?php if ($this->_tpl_vars['errors']['name']): ?> error<?php endif; ?>">
							<label>Name</label>
							<input type="text" size="60" name="name" value="<?php echo $this->_tpl_vars['city']['name']; ?>
" />
							<?php if ($this->_tpl_vars['errors']['name']): ?><span class="suggestion">City name can not be empty</span>
							<!-- ERROR MESSAGES NEED TO BE CHANGED IN page_cities.php --><?php endif; ?>
						</div>
						<div class="group<?php if ($this->_tpl_vars['errors']['asciiName']): ?> error<?php endif; ?>">
							<label>Ascii name</label>
							<input type="text" size="60" name="ascii_name" value="<?php echo $this->_tpl_vars['city']['ascii_name']; ?>
"/>
							<?php if ($this->_tpl_vars['errors']['asciiName']): ?><span class="suggestion"><?php echo $this->_tpl_vars['errors']['asciiName']; ?>
</span>
							<!-- ERROR MESSAGES NEED TO BE CHANGED IN page_cities.php --><?php endif; ?>
						</div>
						<div class="group_submit">
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
cities/" class="button_gray">Cancel</a>
							<button type="submit"><span><?php if ($this->_tpl_vars['action'] == 'add'): ?>Save city<?php else: ?>Save changes<?php endif; ?></span></button>
							<?php if ($this->_tpl_vars['action'] == 'edit'): ?><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['city']['id']; ?>
" /><?php endif; ?>
						</div>
					</div>
				</div>

				<div class="left span1 block last">
					<h3>Additional information</h3>
					<div class="block_inner">
						<p><strong>Name:</strong> the name of the city that is being used in the text. For example:</p>
						<pre>The Hague</pre>
						<p class="mt1"><strong>Ascii name:</strong> the name of the city that is being used in url's. It must not contain spaces, other special chars and we strongly advice you to keep everything lowercase. For example:</p>
						<pre>the-hague</pre>
					</div>
				</div>
			</div>
		</form>
	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>