<?php /* Smarty version 2.6.26, created on 2010-10-15 09:15:36
         compiled from publish-write.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'publish-write.tpl', 51, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<div class="steps">
				<div id="step-1" class="step-active">
					<?php echo $this->_tpl_vars['translations']['publish']['step1']; ?>

				</div>
				<div id="step-2">
					<?php echo $this->_tpl_vars['translations']['publish']['step2']; ?>

				</div>
				<div id="step-3">
					<?php echo $this->_tpl_vars['translations']['publish']['step3']; ?>

				</div>
				<div class="clear"></div>
			</div>
			<br />
			<?php if ($this->_tpl_vars['filter_error']): ?>
			<div class="validation-failure">
				<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" />
				<?php echo $this->_tpl_vars['filter_error']; ?>

			</div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['errors']): ?>
			<div class="validation-failure">
				<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" />
				<?php echo $this->_tpl_vars['translations']['publish']['form_error']; ?>

			</div>
			<?php endif; ?>

			<form id="publish_form" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/">
				<fieldset>
					<legend><?php echo $this->_tpl_vars['translations']['publish']['job_details']; ?>
</legend>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td colspan="2">
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
								<input class="no-border" type="radio" name="type_id" id="type_id_<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
" <?php if (! $this->_tpl_vars['job']['type_id'] && ! $_POST['type_id']): ?><?php if ($this->_sections['tmp2']['first']): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id'] == $this->_tpl_vars['job']['type_id']): ?>checked="checked"<?php endif; ?><?php if ($this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id'] == $_POST['type_id']): ?>checked="checked"<?php endif; ?><?php endif; ?> />
								<label for="type_id_<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['id']; ?>
"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['types'][$this->_sections['tmp2']['index']]['name']; ?>
" /></label>
								<?php endfor; endif; ?>&nbsp;&nbsp;
								<select name="category_id" id="category_id" tabindex="1">
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
							</td>
						</tr>
						<tr>
							<td class="publish-label" valign="top"><?php echo $this->_tpl_vars['translations']['publish']['title_label']; ?>
:</td>
							<td>
								<input <?php if ($this->_tpl_vars['errors']['title']): ?>class="error"<?php endif; ?> type="text" name="title" id="title" tabindex="2" size="50" value="<?php if ($this->_tpl_vars['job']['company']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_POST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
								<?php if ($this->_tpl_vars['errors']['title']): ?><span class="validation-error"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /></span><?php endif; ?>
								<div class="<?php echo $this->_tpl_vars['translations']['publish']['title_info']; ?>
"></div>
							</td>
						</tr>
						<tr>
							<td valign="top"><?php echo $this->_tpl_vars['translations']['publish']['location_label']; ?>
:</td>
							<td>
								<select name="city_id" id="city_id" tabindex="3" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != '' || $_POST['location_outside_ro_where'] != ''): ?>disabled="disabled"<?php endif; ?>>
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
								<a id="other_location_label" href="#" onclick="Jobber.HandleLocationOutsideRo(); return false;"><?php if ($this->_tpl_vars['job']['location_outside_ro'] != '' || $_POST['location_outside_ro_where'] != ''): ?><?php echo $this->_tpl_vars['translations']['publish']['location_pick_from_list']; ?>
<?php else: ?><?php echo $this->_tpl_vars['translations']['publish']['other']; ?>
<?php endif; ?></a>
								<div id="location_outside_ro" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != '' || $_POST['location_outside_ro_where'] != ''): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>
									<?php echo $this->_tpl_vars['translations']['publish']['where']; ?>
 <input type="text" name="location_outside_ro_where" id="location_outside_ro_where" size="50" maxlength="140" <?php if ($this->_tpl_vars['job']['location_outside_ro'] != ''): ?>value="<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php endif; ?><?php if ($_POST['location_outside_ro_where'] != ''): ?>value="<?php echo ((is_array($_tmp=$_POST['location_outside_ro_where'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php endif; ?> />
									<div class="suggestion"><?php echo $this->_tpl_vars['translations']['publish']['where_info']; ?>
</div>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="top"><?php echo $this->_tpl_vars['translations']['publish']['description_label']; ?>
:</td>
							<td><textarea <?php if ($this->_tpl_vars['errors']['description']): ?>class="error"<?php endif; ?> tabindex="4" name="description" id="description" cols="80" rows="15"><?php if ($this->_tpl_vars['job']['company']): ?><?php echo $this->_tpl_vars['job']['description']; ?>
<?php else: ?><?php echo $_POST['description']; ?>
<?php endif; ?></textarea>
								<?php if ($this->_tpl_vars['errors']['description']): ?><span class="validation-error"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /></span><?php endif; ?>
								<div class="suggestion">
									<a target="_blank" href="http://www.textism.com/tools/textile/" onclick="$('#textile-suggestions').toggle(); return false;"><?php echo $this->_tpl_vars['translations']['publish']['description_info']; ?>
</a></div>
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
							</td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<legend><?php echo $this->_tpl_vars['translations']['publish']['company']; ?>
</legend>
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td class="publish-label"><?php echo $this->_tpl_vars['translations']['publish']['name_label']; ?>
:</td>
							<td><input <?php if ($this->_tpl_vars['errors']['company']): ?>class="error"<?php endif; ?> tabindex="6" type="text" name="company" id="company" size="40" value="<?php if ($this->_tpl_vars['job']['company']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$_POST['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
							<span class="validation-error"><?php if ($this->_tpl_vars['errors']['company']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>
							</td>
						</tr> 
						<tr>
							<td valign="top"><?php echo $this->_tpl_vars['translations']['publish']['website_label']; ?>
:</td>
							<td>http://<input tabindex="7" type="text" name="url" id="url" size="35" value="<?php if ($this->_tpl_vars['job']['company']): ?><?php echo $this->_tpl_vars['job']['url']; ?>
<?php else: ?><?php echo $_POST['url']; ?>
<?php endif; ?>" />
								<div class="suggestion"><?php echo $this->_tpl_vars['translations']['publish']['website_info']; ?>
</div>
							</td>
						</tr>
						<tr>
							<td class="publish-label"><?php echo $this->_tpl_vars['translations']['publish']['email_label']; ?>
<br /><strong>(<?php echo $this->_tpl_vars['translations']['publish']['email_info1']; ?>
)</strong>:</td>
							<td>
								<input <?php if ($this->_tpl_vars['errors']['poster_email']): ?>class="error"<?php endif; ?> tabindex="8" type="text" name="poster_email" id="poster_email" size="40" value="<?php if ($this->_tpl_vars['job']['poster_email']): ?><?php echo $this->_tpl_vars['job']['poster_email']; ?>
<?php else: ?><?php echo $_POST['poster_email']; ?>
<?php endif; ?>" />
								<span class="validation-error"><?php if ($this->_tpl_vars['errors']['poster_email']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>
								<div class="suggestion">
									<?php echo $this->_tpl_vars['translations']['publish']['email_info2']; ?>

								</div>
							</td>
						</tr>
					</table>
				</fieldset>
				<?php if ($this->_tpl_vars['ENABLE_RECAPTCHA']): ?>
				<fieldset>
					<legend><?php echo $this->_tpl_vars['translations']['captcha']['captcha_title']; ?>
</legend>
					<?php echo '
					<script type="text/javascript">
					  var RecaptchaOptions = {
					    theme : \'white\',
					    tabindex : 9
					  };
					</script>
					'; ?>

					<?php echo $this->_tpl_vars['the_captcha']; ?>
 <span class="validation-error"><?php if ($this->_tpl_vars['errors']['captcha']): ?>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /> <?php echo $this->_tpl_vars['errors']['captcha']; ?>
<?php endif; ?></span>
				</fieldset>
				<?php endif; ?>
				<fieldset><input type="checkbox" name="apply_online" id="apply_online" class="no-border" <?php if ($this->_tpl_vars['job']['apply_online'] == 1 || $this->_tpl_vars['is_apply'] == 1): ?>checked="checked"<?php endif; ?><?php if (! isset ( $this->_tpl_vars['job']['apply_online'] ) && ! isset ( $this->_tpl_vars['is_apply'] )): ?>checked="checked"<?php endif; ?> /><label for="apply_online"><?php echo $this->_tpl_vars['translations']['publish']['apply_online']; ?>
</label></fieldset>
				<fieldset><input type="submit" name="submit" id="submit" value="<?php echo $this->_tpl_vars['translations']['publish']['step1_submit']; ?>
" /></fieldset>
				<fieldset class="hidden">					
					<input type="hidden" name="action" <?php if ($this->_tpl_vars['job']['id'] || $_SESSION['later_edit']): ?>value="edit"<?php else: ?>value="publish"<?php endif; ?> />
					<?php if ($_SESSION['later_edit']): ?><input type="hidden" name="auth" value="<?php echo $_SESSION['later_edit']; ?>
" /><?php endif; ?>
					<?php if ($this->_tpl_vars['job']['id']): ?><input type="hidden" name="job_id" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" /><?php endif; ?>
				</fieldset>
			</form>
		</div><!-- /content -->
		
		<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#title\').focus();
				
				$("#publish_form").validate({
					rules: {
                        type_id: { required: true },
						company: { required: true },
						title: { required: true },
						description: { required: true },
						poster_email: { required: true, email: true }
					},
					messages: {
                        type_id: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',					   
						company: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						title: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						location: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						description: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						poster_email: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\'
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