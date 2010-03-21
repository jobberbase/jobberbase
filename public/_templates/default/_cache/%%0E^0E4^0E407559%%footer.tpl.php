<?php /* Smarty version 2.6.26, created on 2010-02-06 13:54:54
         compiled from footer.tpl */ ?>
	</div><!-- #container -->
	<div class="footer">
		<div id="footer-contents">
			<div id="footer-col1">
				<?php echo $this->_tpl_vars['translations']['footer']['column_use']; ?>
:<br />
				<?php if ($this->_tpl_vars['navigation']['footer1'] != ''): ?>
					<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['footer1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && $this->_tpl_vars['navigation']['footer1'][$this->_sections['tmp']['index']]['url'] != 'post' )): ?>
							<a href="<?php if ($this->_tpl_vars['navigation']['footer1'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['footer1'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['footer1'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['footer1'][$this->_sections['tmp']['index']]['name']; ?>
</a><br />
						<?php endif; ?>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</div>
			<div id="footer-col2">
				<?php echo $this->_tpl_vars['translations']['footer']['column_find']; ?>
:<br />
				<?php if ($this->_tpl_vars['navigation']['footer2'] != ''): ?>
					<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['footer2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && $this->_tpl_vars['navigation']['footer2'][$this->_sections['tmp']['index']]['url'] != 'post' )): ?>
							<a href="<?php if ($this->_tpl_vars['navigation']['footer2'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['footer2'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['footer2'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['footer2'][$this->_sections['tmp']['index']]['name']; ?>
</a><br />
						<?php endif; ?>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</div>
			<div id="footer-col3">
				<?php echo $this->_tpl_vars['translations']['footer']['column_misc']; ?>
:<br />
				<?php if ($this->_tpl_vars['navigation']['footer3'] != ''): ?>
					<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['footer3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && $this->_tpl_vars['navigation']['footer3'][$this->_sections['tmp']['index']]['url'] != 'post' )): ?>
							<a href="<?php if ($this->_tpl_vars['navigation']['footer3'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['footer3'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['footer3'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['footer3'][$this->_sections['tmp']['index']]['name']; ?>
</a><br />
						<?php endif; ?>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</div>
			<div id="footer-copyright">
				<?php echo $this->_tpl_vars['translations']['footer']['powered_by']; ?>

				<a href="http://www.jobberbase.com/" title="open source job board software">jobberBase</a>
			</div>
			<div class="clear"></div>
		</div><!-- #footer-contents -->
	</div><!-- .footer -->
	<?php echo '
	<script type="text/javascript">
		//<![CDATA[
		
 		$(document).ready(function()
		{
		   var keywords = $(\'#keywords\');
			// setup search box
			keywords.bind(\'click\', function() {
				if (this.value == \''; ?>
<?php echo $this->_tpl_vars['translations']['search']['default']; ?>
<?php echo '\')
				{
					keywords.clearFields();
				}
			});

			keywords.bind(\'blur\', function() {  
				if (this.value == \''; ?>
<?php echo $this->_tpl_vars['translations']['search']['default']; ?>
<?php echo '\' || this.value == \'\')
				{
					this.value = \''; ?>
<?php echo $this->_tpl_vars['translations']['search']['default']; ?>
<?php echo '\';
				}
			});

			// setup live search
			keywords.keyup(function(key) {
				var searchKeywords = jQuery.trim(this.value);
				var len = searchKeywords.length;
				
			    if (key.keyCode != 9 && len >= 3)
				{
					$("#indicator").show();	
					clearTimeout(window.search_timer);	
					window.search_timer = setTimeout(function(){Jobber.PerformSearch(\''; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo 'search/'; ?>
<?php echo $this->_tpl_vars['current_category']; ?>
<?php echo '|\', searchKeywords)}, 800);
			    }
			});
		});
		Jobber.jobber_url = "'; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo '";
		//]]>
	</script>
	'; ?>

	<?php 
	  if (isset($_SESSION['status']))
		{
			unset($_SESSION['status']);
		}
		if (isset($_SESSION['apply_mail_sent']))
		{
			unset($_SESSION['apply_mail_sent']);
		}
		if (isset($_SESSION['apply_errors']))
		{
			unset($_SESSION['apply_errors']);
		}
		if (isset($_SESSION['apply_fields']))
		{
			unset($_SESSION['apply_fields']);
		}
		if (isset($_SESSION['apply_allowed']))
		{
			unset($_SESSION['apply_allowed']);
		}
		if (isset($_SESSION['apply_successful']))
		{
			unset($_SESSION['apply_successful']);
		}
		if (isset($_SESSION['contact_msg_sent']))
		{
			unset($_SESSION['contact_msg_sent']);
		}
		if (isset($_SESSION['contact_errors']))
		{
			unset($_SESSION['contact_errors']);
		}
		if (isset($_SESSION['contact_fields']))
		{
			unset($_SESSION['contact_fields']);
		}
	 ?>
</body>
</html>