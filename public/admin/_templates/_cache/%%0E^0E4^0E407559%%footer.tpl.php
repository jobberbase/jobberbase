<?php /* Smarty version 2.6.26, created on 2010-02-06 13:56:35
         compiled from footer.tpl */ ?>
	</div><!-- #wrap -->
	<div class="footer clear">
	</div><!-- .footer -->
	<?php echo '
	<script type="text/javascript">
		//<![CDATA[
		Jobber.jobber_admin_url = "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo '";
		Jobber.FixPng();
		//]]>
	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.iframe").fancybox({
				hideOnContentClick: true,
				frameWidth: 980,
				frameHeight: 500
			});
		}); 
	</script>
	
	'; ?>

	<div id="overlay"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
img/ajax-loader.gif" /></div>
	<div id="messagesContainer"></div>
	<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'categories'): ?>
	<div id="help" style="display: none;">
		<p class="bold">Categories help</p>
		<ul>
			<li><strong>Name</strong>: The name that will be used in the template</li>
			<li><strong>Title</strong>:</li>
			<li><strong>Description</strong>:</li>
			<li><strong>Keywords</strong>:</li>
			<li><strong>URL</strong>:</li>
		</ul>
	</div>
	<?php endif; ?>
</body>
</html>