{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div>
			{include file="home.tpl"}
		</div><!-- #content -->
		{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(".job-posts tr").mouseover(function() {$(this).addClass("over");}).mouseout(function() {$(this).removeClass("over");});
				$(".job-posts tr:odd").addClass("alt");
			});
		</script>
		{/literal}

{include file="footer.tpl"}