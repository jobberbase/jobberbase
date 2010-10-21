<?php /* Smarty version 2.6.26, created on 2010-10-15 04:12:15
         compiled from page.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<h3 class="page-heading"><?php echo $this->_tpl_vars['page']['title']; ?>
</h3>
			<?php echo $this->_tpl_vars['page']['content']; ?>

			<?php if ($this->_tpl_vars['page']['has_form'] == '1'): ?>
			<?php if ($this->_tpl_vars['errors']): ?>
			<div class="validation-failure">
				<?php echo $this->_tpl_vars['errors']['contact_error']; ?>

			</div>
			<?php elseif ($_SESSION['contact_msg_sent'] == 1): ?>
			<div class="apply-status-ok">
				<?php echo $this->_tpl_vars['page']['form_message']; ?>

			</div>
			<?php endif; ?>
			<?php if ($_SESSION['contact_msg_sent'] != 1): ?>
			<div id="contact-form">
				<div id="contact-form-contents">
					<form id="apply-online" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['page']['url']; ?>
/">
						<label for="contact_name"><?php echo $this->_tpl_vars['translations']['contact']['name_label']; ?>
:</label><br />
						<input <?php if ($this->_tpl_vars['errors']['contact_name']): ?>class="error"<?php endif; ?> type="text" name="contact_name" id="contact_name" maxlength="50" size="30" value="<?php echo $_POST['contact_name']; ?>
" />
						<span class="validation-error"><?php if ($this->_tpl_vars['errors']['contact_name']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>	
						<br /><br />
						<label for="contact_email"><?php echo $this->_tpl_vars['translations']['contact']['email_label']; ?>
:</label><br />
						<input <?php if ($this->_tpl_vars['errors']['contact_email']): ?>class="error"<?php endif; ?> type="text" name="contact_email" id="contact_email" maxlength="50" size="30" value="<?php echo $_POST['contact_email']; ?>
" />
						<span class="validation-error"><?php if ($this->_tpl_vars['errors']['contact_email']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>	
						<br /><br />
						<label for="contact_msg"><?php echo $this->_tpl_vars['translations']['contact']['message_label']; ?>
:</label><br />
						<textarea <?php if ($this->_tpl_vars['errors']['contact_msg']): ?>class="error"<?php endif; ?> name="contact_msg" id="contact_msg" cols="50" rows="8"><?php echo $_POST['contact_msg']; ?>
</textarea>
						<span class="validation-error"><?php if ($this->_tpl_vars['errors']['contact_msg']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>
						<?php if ($this->_tpl_vars['ENABLE_RECAPTCHA']): ?>
							<br /><br />
							<label for="recaptcha_response_field"><?php echo $this->_tpl_vars['translations']['captcha']['captcha_title']; ?>
:</label><br />
							<?php echo '
							<script type="text/javascript">
							  var RecaptchaOptions = {
							    theme : \'white\',
							    tabindex : 9
							  };
							</script>
							'; ?>

							<?php echo $this->_tpl_vars['the_captcha']; ?>

							<span class="validation-error"><?php if ($this->_tpl_vars['errors']['captcha']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /> <?php echo $this->_tpl_vars['errors']['captcha']; ?>
<?php endif; ?></span>
						<?php endif; ?>
						<br /><br />
						<input type="submit" name="submit" id="submit" value="<?php echo $this->_tpl_vars['translations']['contact']['submit']; ?>
" />
					</form>
				</div><!-- #contact-form-contents -->
				<?php endif; ?>
			</div><!-- #contact-form -->
			<?php endif; ?>
		</div><!-- /content -->
		<?php if ($this->_tpl_vars['page']['has_form'] == '1'): ?>
		<?php echo '
		<script type="text/javascript">
	 		$(document).ready(function()
			{
				$("#apply-online").validate({
					rules: {
						contact_name: { required: true },
						contact_email: { required: true, email: true },
						contact_msg: { required: true }
					},
					messages: {
						contact_name: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						contact_email: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
						contact_msg: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\'
					}
				});
			});
		</script>
		'; ?>

		<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>