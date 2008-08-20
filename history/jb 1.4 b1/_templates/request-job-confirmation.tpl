{include file="header.tpl"}
		
		<div id="content">
			<div id="job-listings"></div><!-- #job-listings -->
			<br />
			{if $status == 1}
			<div class="posted-ok">
				<p>
					We really appreciate your time! Thanks!
				</p>
			</div>
			<br />
			<a href="{$BASE_URL}">&laquo; go back to homepage</a>
			{else}
			<div class="posted-pending">
				We're sorry, but we couldn't save the info... Maybe you can try again!
			</div>
			<br />
			<p>
				<a href="{$BASE_URL}jobul-ideal/">&laquo; try again</a>?
			</p>
			{/if}
		</div><!-- /content -->

{include file="footer.tpl"}