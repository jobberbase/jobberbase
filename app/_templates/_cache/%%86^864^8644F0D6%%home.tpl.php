<?php /* Smarty version 2.6.10, created on 2007-10-29 19:57:57
         compiled from home.tpl */ ?>
				<?php if ($this->_tpl_vars['latest_jobs']): ?>
				<h2>Most recent job offers</h2>
				<table id="job-posts" class="job-posts" cellspacing="0">
				<?php $_from = $this->_tpl_vars['latest_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
					<tr>
						<td>
							<?php if ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FULLTIME): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-fulltime.png" alt="full-time" />
							<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_PARTTIME): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-parttime.png" alt="part-time" />
							<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FREELANCE): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-freelance.png" alt="freelance" />
							<?php endif; ?>
							<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
job/<?php echo $this->_tpl_vars['job']['id']; ?>
/<?php echo $this->_tpl_vars['job']['url_title']; ?>
/" title="<?php echo $this->_tpl_vars['job']['title']; ?>
"><?php echo $this->_tpl_vars['job']['title']; ?>
</a> <span class="la">at</span> <?php echo $this->_tpl_vars['job']['company'];  if ($this->_tpl_vars['job']['location'] == 'Oriunde'): ?>, <?php echo $this->_tpl_vars['job']['location'];  else: ?> <span class="la">in</span> <?php echo $this->_tpl_vars['job']['location'];  endif; ?>
						</td>
						<td class="time-posted"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/clock.gif" alt="" /> <?php echo $this->_tpl_vars['job']['created_on']; ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['most_applied_to_jobs']): ?>
				<br />
				<h3>Most applied to IT jobs</h3>
				<table id="job-posts3" class="job-posts" cellspacing="0">
				<?php $_from = $this->_tpl_vars['most_applied_to_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
					<tr>
						<td>
							<?php if ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FULLTIME): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-fulltime.png" alt="full-time" />
							<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_PARTTIME): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-parttime.png" alt="part-time" />
							<?php elseif ($this->_tpl_vars['job']['type_id'] == @JOBTYPE_FREELANCE): ?>
							<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
img/icon-freelance.png" alt="freelance" />
							<?php endif; ?>
							<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
job/<?php echo $this->_tpl_vars['job']['id']; ?>
/<?php echo $this->_tpl_vars['job']['url_title']; ?>
/" title="<?php echo $this->_tpl_vars['job']['title']; ?>
"><?php echo $this->_tpl_vars['job']['title']; ?>
</a> <span class="la">at</span> <?php echo $this->_tpl_vars['job']['company'];  if ($this->_tpl_vars['job']['location'] == 'Oriunde'): ?>, <?php echo $this->_tpl_vars['job']['location'];  else: ?> <span class="la">in</span> <?php echo $this->_tpl_vars['job']['location'];  endif; ?>
						</td>
						<td class="time-posted"><strong><?php echo $this->_tpl_vars['job']['apps']; ?>
</strong> applicants</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
				<?php endif; ?>
				<?php if (! $this->_tpl_vars['latest_jobs'] && ! $this->_tpl_vars['most_applied_to_jobs']): ?>
				<br />
				<p>
					No jobs, yet.<br />
					Do you wish to <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="post a new job">post a new one</a>?
				</p>
				<?php endif; ?>