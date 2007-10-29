<?php /* Smarty version 2.6.10, created on 2007-10-29 19:58:00
         compiled from job.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "job-details.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'job'): ?>
			<div id="job-bottom">
				<div id="job-post-utils">
					<a href="<?php echo $this->_tpl_vars['back_link']; ?>
" title="home">&laquo; go back</a><br />
					Is this job ad fake? <a href="#" onclick="Jobber.ReportSpam('<?php echo $this->_tpl_vars['BASE_URL']; ?>
report-spam/', <?php echo $this->_tpl_vars['job']['id']; ?>
); return false;" title="report fake ad">Report it!</a>
					&nbsp;&nbsp;<span id="report-spam-response"></span><br />
					<a href="#" onclick="Jobber.SendToFriend.showHide(); return false;" title="Recommend to a friend">Recommend to a friend</a>
				</div><!-- #job-post-utils -->
				<div id="number-views">
					Published at <strong><?php echo $this->_tpl_vars['job']['created_on']; ?>
</strong><br />
					Viewed: <strong><?php echo $this->_tpl_vars['job']['views_count']; ?>
</strong> times
				</div><!-- #number-views -->
				<div class="clear"></div>
			</div><!-- #job-bottom -->
			<div id="send-to-friend" style="display: none;">
				<form id="frm-send-to-friend" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
send-to-friend/">
					<table>
						<tr>
							<td class="send-to-friend-address-label"><label for="friend_email">Friend's e-mail:</label></td>
							<td><input type="text" name="friend_email" id="friend_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td><label for="my_email">Your e-mail:</label></td>
							<td><input type="text" name="my_email" id="my_email" maxlength="50" size="30" /></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" id="submit" value="Send" />
								&nbsp;&nbsp;<span id="send-to-friend-response"></span>
							</td>
						</tr>
					</table>
				</form>
			</div><!-- #send-to-friend -->
			<?php echo '
			<script type="text/javascript">
				$(document).ready(function()
				{
					Jobber.SendToFriend.sendMsg();
				});
			</script>
			'; ?>

			<?php endif; ?>
		</div><!-- /content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>