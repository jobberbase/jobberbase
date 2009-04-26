			<div id="job-details">
				{if $smarty.session.apply_successful AND $smarty.session.apply_successful eq 1}
				<div class="apply-status-ok">
					{$translations.apply.success}
				</div>
				{/if}
				{if $job.days_old > 40}
				<div id="old-ad">
					{$translations.apply.old_ad}
				</div>
				{/if}
				{if $CURRENT_PAGE == 'job'}
				<div id="applied-to-job">
					{$job.applied_count}
					{if $job.applied_count != 1}
					<p>{$translations.homepage.applicants}</p>
					{else}
					<p>{$translations.homepage.applicant}</p>
					{/if}
				</div>
				{/if}
				<h2>
					{if $job.type_id == $smarty.const.JOBTYPE_FULLTIME}
					<img src="{$BASE_URL}img/icon-fulltime.png" alt="full time" />
					{elseif $job.type_id == $smarty.const.JOBTYPE_PARTTIME}
					<img src="{$BASE_URL}img/icon-parttime.png" alt="part time" />
					{elseif $job.type_id == $smarty.const.JOBTYPE_FREELANCE}
					<img src="{$BASE_URL}img/icon-freelance.png" alt="freelance" />
					{/if} {$job.title} 
				</h2>
				<p>
					<span class="fading">at</span>
					{if $job.url && $job.url != 'http://'}
					<a href="{$job.url}">{$job.company}</a>
					{else}
					<strong>{$job.company}</strong>
					{/if}
					{if $job.location == 'Anywhere'}
					<strong>({$job.location})</strong>
					{else}
					<span class="fading">{$translations.homepage.in}</span> <strong>{$job.location}</strong>
					{/if}
				</p>
				<div id="job-description">
				{$job.description}
				</div><br />
				{if $job.apply_online == 1 && $CURRENT_PAGE != 'verify'}
					<div id="apply_online_now"><a href="#" onclick="$('#apply-online').SwitchVertically(10); document.getElementById('apply_name').focus(); window.location.href = '#apply'; return false;">&raquo; Apply now</a><a href="#" name="apply">&nbsp;</a></div>
					{if $smarty.session.apply_successful AND $smarty.session.apply_successful eq -1}
					<div class="validation-failure">
						<img src="{$BASE_URL}img/icon-delete.png" alt="" />
						{if $smarty.session.apply_allowed AND $smarty.session.apply_allowed eq -1}
							{$translations.apply.error_apply_timeout_not_passed|replace:'%minutes%':$smarty.const.MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP}
						{elseif $smarty.session.apply_mail_sent AND $smarty.session.apply_mail_sent eq -1}
							{$translations.apply.error_sending_mail}
						{else}
							{$translations.apply.errro_apply_data_invalid}
						{/if}
					</div>
					{/if}
				
					<div id="apply-online" {if $smarty.session.apply_successful AND $smarty.session.apply_successful eq -1}style="display: block;"{else}style="display: none;"{/if}>
						<form id="frm-apply-online" method="post" enctype="multipart/form-data" action="{$BASE_URL}apply-online/">
							<table>
								<tr>
									<td><label for="apply_name">{$translations.apply.name_label}:</label></td>
									<td>
										<input {if $smarty.session.apply_errors.apply_name}class="error"{/if} type="text" name="apply_name" id="apply_name" maxlength="50" size="30" value="{$smarty.session.apply_fields.apply_name}" />
										<span class="validation-error">{if $smarty.session.apply_errors.apply_name}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
									</td>
								</tr>
								<tr>
									<td><label for="apply_email">{$translations.apply.email_label}:</label></td>
									<td>
										<input {if $smarty.session.apply_errors.apply_email}class="error"{/if} type="text" name="apply_email" id="apply_email" maxlength="50" size="30" value="{$smarty.session.apply_fields.apply_email}" />
										<span class="validation-error">{if $smarty.session.apply_errors.apply_email}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_msg">{$translations.apply.message_label}:</label></td>
									<td>
										<textarea {if $smarty.session.apply_errors.apply_msg}class="error"{/if} name="apply_msg" id="apply_msg" cols="60" rows="15">{$smarty.session.apply_fields.apply_msg}</textarea>
										<span class="validation-error">{if $smarty.session.apply_errors.apply_msg}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
									</td>
								</tr>
								<tr>
									<td valign="top"><label for="apply_cv">{$translations.apply.cv_label}:</label></td>
									<td>
										<input type="file" name="apply_cv" id="apply_cv" />
										<span class="validation-error">{if $smarty.session.apply_errors.apply_cv}<img src="{$BASE_URL}img/icon-delete.png" alt="" />{/if}</span>	
										<div class="suggestion">{$translations.apply.cv_info}</div>
									</td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" id="submit" value="{$translations.apply.submit}" /> {$translations.apply.or}
										<a href="#" onclick="$('#apply-online').SwitchVertically(10); return false;">{$translations.apply.cancel}</a>
									</td>
								</tr>
							</table>
							<input type="hidden" name="job_id" id="job_id" value="{$job.id}" />
						</form>
					</div><!-- #apply-online -->
				{/if}
			</div><!-- #job-details -->
{literal}
	<script type="text/javascript">
	$(document).ready(function() { 
{/literal}
{if $smarty.session.apply_successful AND $smarty.session.apply_successful eq -1}
	{literal}
		if (document.getElementById("apply_name"))
		{
			window.location.href = "#apply";
			document.getElementById("apply_name").focus();	
		}
	{/literal}
{/if}
{literal}
	$("#frm-apply-online").validate({
		rules: {
			apply_name: { required: true },
			apply_email: { required: true },
			apply_msg: { required: true },
			apply_url: { required: true }
		},
		messages: {
			apply_name: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
			apply_email: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
			apply_msg: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />',
			apply_url: ' <img src="{/literal}{$BASE_URL}{literal}img/icon-delete.png" alt="" />'
		}
	});
	}); 
	</script>
{/literal}