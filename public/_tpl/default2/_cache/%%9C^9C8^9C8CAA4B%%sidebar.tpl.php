<?php /* Smarty version 2.6.26, created on 2010-10-15 09:15:39
         compiled from sidebar.tpl */ ?>
			<?php if ($this->_tpl_vars['CURRENT_PAGE'] != ''): ?>
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
" title="<?php echo $this->_tpl_vars['translations']['header']['title']; ?>
">&laquo; <?php echo $this->_tpl_vars['translations']['header']['home']; ?>
</a><br />
			<?php endif; ?>

			<?php if ($this->_tpl_vars['navigation']['secondary'] != ''): ?>
			<h4><?php echo $this->_tpl_vars['translations']['sidebar']['menu_title']; ?>
</h4>
			<ul>
				<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['secondary']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && $this->_tpl_vars['navigation']['secondary'][$this->_sections['tmp']['index']]['url'] != 'post' )): ?>
						<li><a href="<?php if ($this->_tpl_vars['navigation']['secondary'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['secondary'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['secondary'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['secondary'][$this->_sections['tmp']['index']]['name']; ?>
</a></li>
					<?php endif; ?>
				<?php endfor; endif; ?>
			<?php endif; ?>
			</ul>
			
			<?php if ($_SESSION['last_viewed_jobs']): ?>
			<h4><?php echo $this->_tpl_vars['translations']['header']['seen_recently']; ?>
</h4>
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
 <?php echo $this->_tpl_vars['translations']['homepage']['sidebar_totaljobs']; ?>
</strong>
				<br />
				<?php if (@SIDEBAR_SHOW_WHAT == 'categories'): ?>
					<?php $_from = $this->_tpl_vars['jobs_count_all_categs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
					<strong><?php echo $this->_tpl_vars['job']['categ_count']; ?>
</strong> <?php echo $this->_tpl_vars['translations']['homepage']['sidebar_for']; ?>
 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/<?php echo $this->_tpl_vars['job']['categ_varname']; ?>
/"><?php echo $this->_tpl_vars['job']['categ_name']; ?>
</a><br />
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
					<?php $_from = $this->_tpl_vars['jobs_count_per_city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
					<strong><?php echo $this->_tpl_vars['job']['jobs_in_city']; ?>
</strong> <?php echo $this->_tpl_vars['translations']['jobscity']['sidebar_jobs_in']; ?>
 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS_IN_CITY']; ?>
/<?php echo $this->_tpl_vars['job']['city_ascii_name']; ?>
/"><?php echo $this->_tpl_vars['job']['city_name']; ?>
</a><br />
					<?php endforeach; endif; unset($_from); ?>
					<?php if (! $this->_tpl_vars['hide_other_cities_in_sidebar']): ?>
					<strong><?php echo $this->_tpl_vars['jobs_count_in_other_cities']; ?>
</strong> <?php echo $this->_tpl_vars['translations']['jobscity']['sidebar_jobs_in']; ?>
 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
jobs-in-other-cities/"><?php echo $this->_tpl_vars['translations']['sidebar']['other_cities']; ?>
</a>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- #stats -->
			<?php endif; ?>