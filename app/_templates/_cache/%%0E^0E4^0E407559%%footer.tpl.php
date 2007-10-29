<?php /* Smarty version 2.6.10, created on 2007-10-29 19:57:57
         compiled from footer.tpl */ ?>
	</div><!-- #container -->
	<div class="footer">
		<div id="footer-contents">
			<div id="footer-col1">
				Use:<br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
post/" title="Post a new job">Post a new job</a><br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
widgets/" title="Site widget">Widgets</a><br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/" title="RSS Feeds">RSS Feeds</a><br />
			</div>
			<div id="footer-col2">
				Find out more:<br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
about/" title="about us">About Us</a><br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
contact/" title="Contact">Contact Us</a>
			</div>
			<div id="footer-col3">
				Misc:<br />
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
companies/" title="Companies that posted here">Companies</a><br />
			</div>
			<div class="clear"></div>
		</div><!-- #footer-contents -->
	</div><!-- .footer -->
	<?php echo '
	<script type="text/javascript">
		//<![CDATA[
 		$(document).ready(function()
		{
			// setup search box
			$(\'input#keywords\').bind(\'click\', function() {

				if ($(\'#keywords\').fieldValue() == \'search for a job\')
				{
					$(this).clearFields();
				}
			});
			$(\'input#keywords\').bind(\'blur\', function() {  
				if ($(\'#keywords\').fieldValue() == \'search for a job\' || $(\'#keywords\').fieldValue() == \'\')
				{
					document.getElementById(\'keywords\').value = \'search for a job\';
				}
			});

			// setup live search
			$(\'#keywords\').keyup(function(key) {
				if ($(\'#keywords\').fieldValue() == \'\')
				{
					$(\'#job-listings\').load(\'';  echo $this->_tpl_vars['BASE_URL'];  echo 'search/';  echo $this->_tpl_vars['current_category'];  echo '|/\');
				}
				var len = document.getElementById(\'keywords\').value.length;
			  if (key.keyCode != 9 && len >= 3)
				{
					$("#indicator").show();	
					clearTimeout(window.search_timer);	
					window.search_timer = setTimeout("Jobber.PerformSearch(\'';  echo $this->_tpl_vars['BASE_URL'];  echo 'search/';  echo $this->_tpl_vars['current_category'];  echo '|\')", 800);
			  }
			});
		});
		Jobber.jobber_url = "';  echo $this->_tpl_vars['BASE_URL'];  echo '";
		Jobber.FixPng();
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