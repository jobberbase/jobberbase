<?php /* Smarty version 2.6.10, created on 2007-10-29 19:58:00
         compiled from job-details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'highlight_keywords', 'job-details.tpl', 45, false),)), $this); ?>
			<div id="job-details">
				<?php if ($_SESSION['apply_mail_sent'] && $_SESSION['apply_mail_sent'] == 1): ?>
				<div class="apply-status-ok">
					Congratulations, your application has been sent! Best of luck to you! :)
				</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['job']['days_old'] > 40): ?>
				<div id="old-ad">
					This job ad has been posted over 40 days ago...
				</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'job'): ?>
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
					<?php if ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FULLTIME): ?>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-fulltime.png" alt="full time" />
					<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_PARTTIME): ?>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-parttime.png" alt="part time" />
					<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FREELANCE): ?>
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-freelance.png" alt="freelance" />
					<?php endif; ?> <?php echo $this->_tpl_vars['job']['title']; ?>
 
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
					<?php if ($this->_tpl_vars['job']['location'] == 'Anywhere'): ?>
					<strong>(<?php echo $this->_tpl_vars['job']['location']; ?>
)</strong>
					<?php else: ?>
					<span class="fading">in</span> <strong><?php echo $this->_tpl_vars['job']['location']; ?>
</strong>
					<?php endif; ?>
				</p>
				<div id="job-description">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['description'])) ? $this->_run_mod_handler('highlight_keywords', true, $_tmp, $_SESSION['keywords_array']) : smarty_modifier_highlight_keywords($_tmp, $_SESSION['keywords_array'])); ?>

				</div><br />
				<?php if ($this->_tpl_vars['job']['apply_online'] == 1 && $this->_tpl_vars['CURRENT_PAGE'] != 'verify'): ?>
					<div id="apply_online_now"><a href="#" onclick="$('#apply-online').SwitchVertically(10); document.getElementById('apply_name').focus(); window.location.href = '#apply'; return false;">&raquo; Apply now</a><a href="#" name="apply">&nbsp;</a></div>
					<?php if ($_SESSION['apply_mail_sent'] && $_SESSION['apply_mail_sent'] == -1): ?>
					<div class="validation-failure">
						<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-delete.png" alt="" />
						Unfortunately, your application could not be sent. Please check the form. Also, we only allow 1 application every 10 minutes.
					</div>
					<?php endif; ?>
				
					<div id="apply-online" <?php if ($_SESSION['apply_mail_sent'] && $_SESSION['apply_mail_sent'] == -1): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>
						<form id="frm-apply-online" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
apply-online/">
							<table>
								<tr>
									<td><label for="apply_name">Your name:</label></td>
									<td>
										<input <?php if ($_SESSION['apply_errors']['apply_name']): ?>class="error"<?php endif; ?> type="text" name="apply_name" id="apply_name" maxlength="50" size="30" value="<?php echo $_SESSION['apply_fields']['apply_name']; ?>
" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_name']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td><label for="apply_email">Your e-mail:</label></td>
									<td>
										<input <?php if ($_SESSION['apply_errors']['apply_email']): ?>class="error"<?php endif; ?> type="text" name="apply_email" id="apply_email" maxlength="50" size="30" value="<?php echo $_SESSION['apply_fields']['apply_email']; ?>
" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_email']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_msg">Message<br />or letter of intention:</label></td>
									<td>
										<textarea <?php if ($_SESSION['apply_errors']['apply_msg']): ?>class="error"<?php endif; ?> name="apply_msg" id="apply_msg" cols="60" rows="15"><?php echo $_SESSION['apply_fields']['apply_msg']; ?>
</textarea>
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_msg']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-delete.png" alt="" /><?php endif; ?></span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_cv">Upload resume/CV:</label></td>
									<td>
										<input type="file" name="apply_cv" id="apply_cv" />
										<span class="validation-error"><?php if ($_SESSION['apply_errors']['apply_cv']): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-delete.png" alt="" /><?php endif; ?></span>	
										<div class="suggestion">Max. 3 MB. Recommended formats: PDF, RTF, DOC, ODT. </div>
									</td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" id="submit" value="Send my application" /> or
										<a href="#" onclick="$('#apply-online').SwitchVertically(10); return false;">cancel</a>
									</td>
								</tr>
							</table>
							<input type="hidden" name="job_id" id="job_id" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" />
						</form>
					</div><!-- #apply-online -->
				<?php endif; ?>
			</div><!-- #job-details -->
<?php echo '
<script type="text/javascript">
$(document).ready(function() { 
	';  if ($_SESSION['apply_mail_sent'] && $_SESSION['apply_mail_sent'] == -1):  echo '
	if (document.getElementById("apply_name"))
	{
		window.location.href = "#apply";
		document.getElementById("apply_name").focus();	
	}
	';  endif;  echo '
	$("#frm-apply-online").validate({
		rules: {
			apply_name: { required: true },
			apply_email: { required: true },
			apply_msg: { required: true },
			apply_url: { required: true }
		},
		messages: {
			apply_name: \' <img src="';  echo $this->_tpl_vars['BASE_URL'];  echo 'img/icon-delete.png" alt="" />\',
			apply_email: \' <img src="';  echo $this->_tpl_vars['BASE_URL'];  echo 'img/icon-delete.png" alt="" />\',
			apply_msg: \' <img src="';  echo $this->_tpl_vars['BASE_URL'];  echo 'img/icon-delete.png" alt="" />\',
			apply_url: \' <img src="';  echo $this->_tpl_vars['BASE_URL'];  echo 'img/icon-delete.png" alt="" />\'
		}
	});
}); 
</script>
'; ?>