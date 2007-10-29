<?php /* Smarty version 2.6.10, created on 2007-10-29 19:57:57
         compiled from sidebar.tpl */ ?>
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] != ''): ?>
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
" title="IT jobs">&laquo; home</a><br />
			<?php endif; ?>
			
			<?php if ($_SESSION['last_viewed_jobs']): ?>
			<h4>Seen recently</h4>
			<ul>
				<?php unset($this->_sections['last']);
$this->_sections['last']['name'] = 'last';
$this->_sections['last']['loop'] = is_array($_loop=$_SESSION['last_viewed_jobs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['last']['show'] = true;
$this->_sections['last']['max'] = $this->_sections['last']['loop'];
$this->_sections['last']['step'] = 1;
$this->_sections['last']['start'] = $this->_sections['last']['step'] > 0 ? 0 : $this->_sections['last']['loop']-1;
if ($this->_sections['last']['show']) {
    $this->_sections['last']['total'] = $this->_sections['last']['loop'];
    if ($this->_sections['last']['total'] == 0)
        $this->_sections['last']['show'] = false;
} else
    $this->_sections['last']['total'] = 0;
if ($this->_sections['last']['show']):

            for ($this->_sections['last']['index'] = $this->_sections['last']['start'], $this->_sections['last']['iteration'] = 1;
                 $this->_sections['last']['iteration'] <= $this->_sections['last']['total'];
                 $this->_sections['last']['index'] += $this->_sections['last']['step'], $this->_sections['last']['iteration']++):
$this->_sections['last']['rownum'] = $this->_sections['last']['iteration'];
$this->_sections['last']['index_prev'] = $this->_sections['last']['index'] - $this->_sections['last']['step'];
$this->_sections['last']['index_next'] = $this->_sections['last']['index'] + $this->_sections['last']['step'];
$this->_sections['last']['first']      = ($this->_sections['last']['iteration'] == 1);
$this->_sections['last']['last']       = ($this->_sections['last']['iteration'] == $this->_sections['last']['total']);
?>
				<li><a href="<?php echo $_SESSION['last_viewed_jobs'][$this->_sections['last']['index']]['url']; ?>
">&raquo; <?php echo $_SESSION['last_viewed_jobs'][$this->_sections['last']['index']]['title']; ?>
</a></li>
				<?php endfor; endif; ?>
			</ul>
			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>
			<br />
			<div id="stats">
				<strong><?php echo $this->_tpl_vars['jobs_count_all']; ?>
 total jobs</strong>
				<br />
				<?php $_from = $this->_tpl_vars['jobs_count_all_categs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
				<strong><?php echo $this->_tpl_vars['job']['categ_count']; ?>
</strong> for <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
jobs/<?php echo $this->_tpl_vars['job']['categ_varname']; ?>
/"><?php echo $this->_tpl_vars['job']['categ_name']; ?>
</a><br />
				<?php endforeach; endif; unset($_from); ?>
			</div><!-- #stats -->
			<?php endif; ?>