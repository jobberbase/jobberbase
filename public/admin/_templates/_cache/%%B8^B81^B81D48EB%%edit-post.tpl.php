<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:46
         compiled from edit-post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'edit-post.tpl', 49, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
		<h2 id="edit_job"><?php if ($this->_tpl_vars['job']['id'] == 0): ?>Post a job<?php else: ?>Edit a job<?php endif; ?></h2>
			<div id="job-listings"></div><!-- #job-listings -->

			<?php if ($this->_tpl_vars['filter_error']): ?>
			<div class="fail">
				<?php echo $this->_tpl_vars['filter_error']; ?>

			</div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['errors']): ?>
			<div class="fail">
				<?php echo $this->_tpl_vars['translations']['publish']['form_error']; ?>

			</div>
			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['show_preview']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "edit-post-preview.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>

			<form id="publish_form" method="post" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-post/<?php if ($this->_tpl_vars['job']['id'] != 0): ?><?php echo $this->_tpl_vars['job']['id']; ?>
/<?php endif; ?>">
			
			<div class="clearfix">
				<div class="left span2 block">
					<h3>Job Details</h3>
					<div id="job_details" class="block_inner">
						<div class="group clearfix category">
							<label>Job Type</label>
							<?php unset($this->_sections['tmp2']);
$this->_sections['tmp2']['name'] = 'tmp2';
$this->_sections['tmp2']['loop'] = is_array($_loop=$this->_tpl_vars['types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp2']['show'] = true;
$this->_sections['tmp2']['max'] = $this->_sections['tmp2']['loop'];
$this->_sections['tmp2']['step'] = 1;
$this->_sections['tmp2']['start'] = $this->_sections['tmp2']['step'] > 0 ? 0 : $this->_sections['tmp2']['loop']-1;
if ($this->_sections['tmp2']['show']) {
    $this->_sections['tmp2']['total'] = $this->_sections['tmp2']['loop'];
    if ($this->_sections['tmp2']['total'] == 0)
        $this->_sections['tmp2']['show'] = false;
} else
    $this->_sections['tmp2']['total'] = 0;
if ($this->_sections['tmp2']['show']):

            for ($this->_sections['tmp2']['index'] = $this->_sections['tmp2']['start'], $this->_sections['tmp2']['iteration'] = 1;
                 $this->_sections['tmp2']['iteration'] <= $this->_sections['tmp2']['total'];
                 $this->_sections['tmp2']['index'] += $this->_sections['tmp2']['step'], $this->_sections['tmp2']['iteration']++):
$this->_sections['tmp2']['rownum'] = $this->_sections['tmp2']['iteration'];
$this->_sections['tmp2']['index_prev'] = $this->_sections['tmp2']['index'] - $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['index_next'] = $this->_sections['tmp2']['index'] + $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['first']      = ($this->_sections['tmp2']['iteration'] == 1);
$this->_sections['tmp2']['last']       = ($this->_sections['tmp2']['iteration'] == $this->_sections['tmp2']['total']);
?>
							<div>
								<label for="type_id_<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
">
									<input class="no-border" type="radio" name="type_id" id="type_id_<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
" <?php if (! $this->_tpl_vars['job']['type_id'] && ! $_POST['type_id']): ?><?php if ($this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id'] == 1): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id'] == $this->_tpl_vars['job']['type_id']): ?>checked="checked"<?php endif; ?><?php if ($this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id'] == $_POST['type_id']): ?>checked="checked"<?php endif; ?><?php endif; ?> />
									<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['name']; ?>
" />
								</label>
							</div>
							<?php endfor; endif; ?>
						</div>
						<div class="group">
							<label>Category</label>
							<select name="category_id" id="category_id" class="ml1">
							<?php unset($this->_sections['tmp1']);
$this->_sections['tmp1']['name'] = 'tmp1';
$this->_sections['tmp1']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp1']['show'] = true;
$this->_sections['tmp1']['max'] = $this->_sections['tmp1']['loop'];
$this->_sections['tmp1']['step'] = 1;
$this->_sections['tmp1']['start'] = $this->_sections['tmp1']['step'] > 0 ? 0 : $this->_sections['tmp1']['loop']-1;
if ($this->_sections['tmp1']['show']) {
    $this->_sections['tmp1']['total'] = $this->_sections['tmp1']['loop'];
    if ($this->_sections['tmp1']['total'] == 0)
        $this->_sections['tmp1']['show'] = false;
} else
    $this->_sections['tmp1']['total'] = 0;
if ($this->_sections['tmp1']['show']):

            for ($this->_sections['tmp1']['index'] = $this->_sections['tmp1']['start'], $this->_sections['tmp1']['iteration'] = 1;
                 $this->_sections['tmp1']['iteration'] <= $this->_sections['tmp1']['total'];
                 $this->_sections['tmp1']['index'] += $this->_sections['tmp1']['step'], $this->_sections['tmp1']['iteration']++):
$this->_sections['tmp1']['rownum'] = $this->_sections['tmp1']['iteration'];
$this->_sections['tmp1']['index_prev'] = $this->_sections['tmp1']['index'] - $this->_sections['tmp1']['step'];
$this->_sections['tmp1']['index_next'] = $this->_sections['tmp1']['index'] + $this->_sections['tmp1']['step'];
$this->_sections['tmp1']['first']      = ($this->_sections['tmp1']['iteration'] == 1);
$this->_sections['tmp1']['last']       = ($this->_sections['tmp1']['iteration'] == $this->_sections['tmp1']['total']);
?>
								<option value="<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp1']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['default_categ_id'] != '' && $this->_tpl_vars['default_categ_id'] == $this->_tpl_vars['categories'][$this->_sections['tmp1']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['categories'][$this->_sections['tmp1']['index']]['id'] == $this->_tpl_vars['job']['category_id']): ?>selected="selected"<?php endif; ?><?php if ($this->_tpl_vars['categories'][$this->_sections['tmp1']['index']]['id'] == $_POST['category_id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['categories'][$this->_sections['tmp1']['index']]['name']; ?>
</option>
							<?php endfor; endif; ?>
							</select>
						</div>
						<div class="group<?php if ($this->_tpl_vars['errors']['title']): ?> error<?php endif; ?>">
							<label for="title"><?php echo $this->_tpl_vars['translations']['publish']['title_label']; ?>
</label>
							<input type="text" name="title" id="title" size="50" value="<?php if ($this->_tpl_vars['job']['title']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_POST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
							<div class="<?php echo $this->_tpl_vars['translations']['publish']['title_info']; ?>
"></div>
						</div>
						<div class="group">
							<label for="city_id"><?php echo $this->_tpl_vars['translations']['publish']['location_label']; ?>
</label>
							<select name="city_id" id="city_id" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != ''): ?>disabled="disabled"<?php endif; ?> class="ml1">
								<option value="0"><?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
</option>
								<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['cities']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
								<option value="<?php echo $this->_tpl_vars['cities'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['city_id'] == $this->_tpl_vars['cities'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['job']['city_id'] == $this->_tpl_vars['cities'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_city']['id'] == $this->_tpl_vars['cities'][$this->_sections['c']['index']]['id'] && ! $_POST['city_id'] && ! $this->_tpl_vars['job']['city_id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['cities'][$this->_sections['c']['index']]['name']; ?>
</option>
								<?php endfor; endif; ?>
							</select>
							<a id="other_location_label" href="#" onclick="Jobber.HandleLocationOutsideRo(); return false;"><?php if ($this->_tpl_vars['job']['location_outside_ro'] != ''): ?>pick one from the list<?php else: ?>other<?php endif; ?></a>
							<div id="location_outside_ro" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != ''): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?> class="mt1 ml1">
								<?php echo $this->_tpl_vars['translations']['publish']['where']; ?>
 <input type="text" name="location_outside_ro_where" id="location_outside_ro_where" size="41" maxlength="140" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != ''): ?>value="<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['location_outside_ro'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php endif; ?> />
								<div class="suggestion ml6"><?php echo $this->_tpl_vars['translations']['publish']['where_info']; ?>
</div>
							</div>
						</div>
						<div class="group<?php if ($this->_tpl_vars['errors']['description']): ?> error<?php endif; ?>">
							<label for="description"><?php echo $this->_tpl_vars['translations']['publish']['description_label']; ?>
</label>
							<textarea name="description" id="description" cols="80" rows="15"><?php if ($this->_tpl_vars['job']['description']): ?><?php echo $this->_tpl_vars['job']['description']; ?>
<?php else: ?><?php echo $_POST['description']; ?>
<?php endif; ?></textarea>
							<div class="suggestion">
								<a target="_blank" href="http://www.textism.com/tools/textile/" onclick="$('#textile-suggestions').toggle(); return false;"><?php echo $this->_tpl_vars['translations']['publish']['description_info']; ?>
</a>
							</div>
							<div id="textile-suggestions" style="display: none;">
								<table>
									<thead>
										<tr class="odd">
											<th><?php echo $this->_tpl_vars['translations']['publish']['syntax']; ?>
</th>
											<th><?php echo $this->_tpl_vars['translations']['publish']['result']; ?>
</th>
										</tr>
									</thead>
									<tbody>
										<tr class="even">
											<td>That is _incredible_</td>
											<td>That is <em>incredible</em></td>
	
										</tr>
										<tr class="odd">
											<td>*Indeed* it is</td>
											<td><strong>Indeed</strong> it is</td>
										</tr>
										<tr class="even">
											<td>"Wikipedia":http://www.wikipedia.org</td>
	
											<td><a href="http://www.wikipedia.org">Wikipedia</a></td>
										</tr>
										<tr class="odd">
											<td>* apples<br />* oranges<br />* pears</td>
											<td>
	
												<ul>
													<li>apples</li>
													<li>oranges</li>
													<li>pears</li>
												</ul>
											</td>
										</tr>
	
										<tr class="even">
											<td># first<br /># second<br /># third</td>
											<td>
												<ol>
													<li>first</li>
													<li>second</li>
	
													<li>third</li>
												</ol>
											</td>
										</tr>
									</tbody>
								</table>
							</div><!-- #textile-suggestions -->
						</div>
					</div>
				</div>

				<div id="company_info" class="left span1 block last">
					<h3><?php echo $this->_tpl_vars['translations']['publish']['company']; ?>
</h3>
					<div class="block_inner">
						<div class="group<?php if ($this->_tpl_vars['errors']['company']): ?> error<?php endif; ?>">
							<label for="company"><?php echo $this->_tpl_vars['translations']['publish']['name_label']; ?>
</label>
							<input type="text" name="company" id="company" size="30" value="<?php if ($this->_tpl_vars['job']['company']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_POST['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
						</div>

						<div class="group">
							<label for="url"><?php echo $this->_tpl_vars['translations']['publish']['website_label']; ?>
</label>
							<em>http://</em><input type="text" name="url" id="url" size="25" value="<?php if ($this->_tpl_vars['job']['company']): ?><?php echo $this->_tpl_vars['job']['url']; ?>
<?php else: ?><?php echo $_POST['url']; ?>
<?php endif; ?>" />
							<div class="suggestion"><?php echo $this->_tpl_vars['translations']['publish']['website_info']; ?>
</div>
						</div>
	
						<div class="group<?php if ($this->_tpl_vars['errors']['poster_email']): ?> error<?php endif; ?>">
							<label for="poster_email"><?php echo $this->_tpl_vars['translations']['publish']['email_label']; ?>
 <span class="light">(<?php echo $this->_tpl_vars['translations']['publish']['email_info1']; ?>
)</span></label>
							<input type="text" name="poster_email" id="poster_email" size="30" value="<?php if ($this->_tpl_vars['job']['poster_email']): ?><?php echo $this->_tpl_vars['job']['poster_email']; ?>
<?php else: ?><?php echo $_POST['poster_email']; ?>
<?php endif; ?>" />
							<div class="suggestion"><?php echo $this->_tpl_vars['translations']['publish']['email_info2']; ?>
</div>
						</div>
	
						<div class="group">
							<label for="apply_online">Allow online applications
							<input type="checkbox" name="apply_online" id="apply_online" class="no-indent" <?php if ($this->_tpl_vars['job']['apply_online'] == 1 || $this->_tpl_vars['job']['id'] == 0): ?>checked="checked"<?php endif; ?><?php if (! isset ( $this->_tpl_vars['job']['apply_online'] )): ?>checked="checked"<?php endif; ?> /></label><span class="suggestion">If you are unchecking this, then add a description on how to apply online!</span>
						</div>
						
						<div class="group_submit">
							<button type="button" id="preview" class="gray"><span>Preview</span></button>
							<button type="submit" id="save"><span><?php if ($this->_tpl_vars['job']['id'] == 0): ?>Post job<?php else: ?>Save changes<?php endif; ?></span></button>
							<input type="hidden" name="show_preview" id="show_preview" value="false" />
							<input type="hidden" name="job_id" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" />
						</div>
					</div>
				</div>
			</form>
		</div><!-- /content -->
		
		<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#type_id_1\').focus();
				
				$("#publish_form").validate({
					rules: {
						company: { required: true },
						title: { required: true },
						description: { required: true },
						poster_email: { required: true, email: true }
					},
					messages: {
						company: \'\',
						title: \'\',
						location: \'\',
						description: \'\',
						poster_email: \'\'
					}
				});
				
				$(\'#save\').bind(\'click\', function()
				{
					$("#publish_form").submit();
				});
				
				$(\'#preview\').bind(\'click\', function()
				{
					$(\'#show_preview\').val(\'true\');
					$("#publish_form").submit();
				});
			});
		</script>
		'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>