<?php /* Smarty version 2.6.26, created on 2010-10-15 08:46:49
         compiled from job-details.tpl */ ?>
			<div id="job-details">
				<?php if ($_SESSION['apply_successful'] && $_SESSION['apply_successful'] == 1): ?>
				<div class="apply-status-ok">
					<?php echo $this->_tpl_vars['translations']['apply']['success']; ?>

				</div>
				<?php endif; ?>
				<?php if (( $this->_tpl_vars['job']['days_old'] > @OLD_JOB_NOTIFY ) && ( @OLD_JOB_NOTIFY > 0 )): ?>
				<div id="old-ad">
					<?php echo $this->_tpl_vars['translator']->translate("apply.old_ad",@OLD_JOB_NOTIFY); ?>

				</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['CURRENT_PAGE'] == $this->_tpl_vars['URL_JOB']): ?>
				<div id="applied-to-job">
					<?php echo $this->_tpl_vars['job']['applied_count']; ?>

					<?php if ($this->_tpl_vars['job']['applied_count'] != 1): ?>
					<p><?php echo $this->_tpl_vars['translations']['homepage']['applicants']; ?>
</p>
					<?php else: ?>
					<p><?php echo $this->_tpl_vars['translations']['homepage']['applicant']; ?>
</p>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<h2>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-<?php echo $this->_tpl_vars['job']['type_var_name']; ?>
.png" alt="<?php echo $this->_tpl_vars['job']['type_name']; ?>
" /> <?php echo $this->_tpl_vars['job']['title']; ?>
 
				</h2>
				<p>
					<span class="fading"><?php echo $this->_tpl_vars['translations']['jobs']['preposition_at']; ?>
</span>
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
					<span class="fading"><?php echo $this->_tpl_vars['translations']['homepage']['in']; ?>
</span> <strong><?php echo $this->_tpl_vars['job']['location']; ?>
</strong>
					<?php endif; ?>
				</p>
				<div id="job-description">
				<?php echo $this->_tpl_vars['job']['description']; ?>

				</div>
				<br />
				<?php if ($this->_tpl_vars['job']['apply_online'] == 1 && $this->_tpl_vars['CURRENT_PAGE'] != 'verify'): ?>
					<div id="apply_online_now"><a href="#" onclick="$('#apply-online').toggle(); window.location.href = '#apply'; return false;"><?php echo $this->_tpl_vars['translations']['apply']['apply_message']; ?>
</a></div>
					<?php if ($_SESSION['apply_successful'] && $_SESSION['apply_successful'] == -1): ?>
					<div class="validation-failure">
						<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" />
						<?php if ($_SESSION['apply_allowed'] && $_SESSION['apply_allowed'] == -1): ?>
							<?php echo $this->_tpl_vars['translator']->translate("apply.error_apply_timeout_not_passed",@MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP); ?>

						<?php elseif ($_SESSION['apply_mail_sent'] && $_SESSION['apply_mail_sent'] == -1): ?>
							<?php echo $this->_tpl_vars['translations']['apply']['error_sending_mail']; ?>

						<?php elseif ($_SESSION['apply_errors']['apply_cv']): ?>
							<?php echo $_SESSION['apply_errors']['apply_cv']; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['translations']['apply']['errro_apply_data_invalid']; ?>

						<?php endif; ?>
					</div>
					<?php endif; ?>
			
					<div id="apply-online" <?php if ($_SESSION['apply_successful'] && $_SESSION['apply_successful'] == -1): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>
						<form id="frm-apply-online" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
apply-online/">
							<table>
								<tr>
									<td><label for="apply_name"><?php echo $this->_tpl_vars['translations']['apply']['name_label']; ?>
:</label></td>
									<td>
										<input <?php if ($_SESSION['apply_errors']['apply_name']): ?>class="error"<?php endif; ?> type="text" name="apply_name" id="apply_name" maxlength="50" size="30" value="<?php echo $_SESSION['apply_fields']['apply_name']; ?>
" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_name']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td><label for="apply_email"><?php echo $this->_tpl_vars['translations']['apply']['email_label']; ?>
:</label></td>
									<td>
										<input <?php if ($_SESSION['apply_errors']['apply_email']): ?>class="error"<?php endif; ?> type="text" name="apply_email" id="apply_email" maxlength="50" size="30" value="<?php echo $_SESSION['apply_fields']['apply_email']; ?>
" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_email']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_msg"><?php echo $this->_tpl_vars['translations']['apply']['message_label']; ?>
:</label></td>
									<td>
										<textarea <?php if ($_SESSION['apply_errors']['apply_msg']): ?>class="error"<?php endif; ?> name="apply_msg" id="apply_msg" cols="60" rows="15"><?php echo $_SESSION['apply_fields']['apply_msg']; ?>
</textarea>
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_msg']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_cv"><?php echo $this->_tpl_vars['translations']['apply']['cv_label']; ?>
:</label></td>
									<td>
										<input type="file" name="apply_cv" id="apply_cv" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_cv']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" title="<?php echo $_SESSION['apply_errors']['apply_cv']; ?>
" /><?php endif; ?></span>	
										<div class="suggestion"><?php echo $this->_tpl_vars['translations']['apply']['cv_info']; ?>
</div>
									</td>
								</tr>
								<?php if ($this->_tpl_vars['ENABLE_RECAPTCHA']): ?>
									<tr>
										<td valign="top"><label>Anti-Spam</label></td>
										<td>
											<?php echo '
											<script type="text/javascript">
											  var RecaptchaOptions = {
											    theme : \'white\',
											    tabindex : 9
											  };
											</script>
											'; ?>

											<?php echo $this->_tpl_vars['the_captcha']; ?>
 <span class="validation-error"><?php if ($_SESSION['apply_errors']['captcha']): ?>
											<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/img/icon-delete.png" alt="" /> <?php echo $_SESSION['apply_errors']['captcha']; ?>
<?php endif; ?></span>
										</td>
									</tr>
								<?php endif; ?>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" id="submit" value="<?php echo $this->_tpl_vars['translations']['apply']['submit']; ?>
" /> <?php echo $this->_tpl_vars['translations']['apply']['or']; ?>

										<a href="#" onclick="$('#apply-online').toggle(); return false;"><?php echo $this->_tpl_vars['translations']['apply']['cancel']; ?>
</a>
									</td>
								</tr>
							</table>
							<input type="hidden" name="job_id" id="job_id" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" />
						</form>
					</div><!-- #apply-online -->
				<?php endif; ?>
			<br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "company-posts-loop.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div><!-- #job-details -->
<?php echo '
	<script type="text/javascript">
	$(document).ready(function() { 
'; ?>

<?php if ($_SESSION['apply_successful'] && $_SESSION['apply_successful'] == -1): ?>
	<?php echo '
		if (document.getElementById("apply_name"))
		{
			window.location.href = "#apply";
			document.getElementById("apply_name").focus();	
		}
	'; ?>

<?php endif; ?>
<?php echo '
	$("#frm-apply-online").validate({
		rules: {
			apply_name: { required: true },
			apply_email: { required: true, email: true },
			apply_msg: { required: true },
			apply_cv: { accept: "pdf|rtf|doc|odt" }
		},
		messages: {
			apply_name: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
			apply_email: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
			apply_msg: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\',
			apply_cv: \' <img src="'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
_tpl/<?php echo $this->_tpl_vars['THEME']; ?>
/<?php echo 'img/icon-delete.png" alt="" />\'
		}
	});
	}); 
	</script>
'; ?>