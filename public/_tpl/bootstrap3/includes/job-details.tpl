<div id="job-details">
    {if $smarty.session.apply_successful AND $smarty.session.apply_successful eq 1}
        <div class="alert alert-success">
            {$translations.apply.success}
        </div>
    {/if}
    {if ($job.days_old > $smarty.const.OLD_JOB_NOTIFY) && ($smarty.const.OLD_JOB_NOTIFY > 0)}
        <div class="alert alert-warning">
            {$translator->translate("apply.old_ad", $smarty.const.OLD_JOB_NOTIFY)}
        </div>
    {/if}


    <div class="row">
        <div class="col-md-6">
            <h2>
                {$type = $job.type_var_name}
                {if $type eq 'fulltime'}
                    {$class = 'success'}
                {elseif $type eq 'parttime'}
                    {$class = 'info'}
                {elseif $type eq 'freelance'}
                    {$class = 'warning'}
                {else}
                    {$class = 'default'}
                {/if}

                <span class="label label-{$class}">{$job.type_name}</span> {$job.title}
            </h2>

            <p>
                <span class="fading">{$translations.jobs.preposition_at}</span>
                {if $job.url && $job.url != 'http://'}
                    <a href="{$job.url}">{$job.company}</a>
                {else}
                    <strong>{$job.company}</strong>
                {/if}
                {if $job.is_location_anywhere}
                    <strong>({$translations.jobs.location_anywhere})</strong>
                {else}
                    <span class="fading">{$translations.homepage.in}</span> <strong>{$job.location}</strong>
                {/if}
            </p>
        </div>
        <div class="col-md-6">
            {if $CURRENT_PAGE == $URL_JOB}
                <div id="applied-to-job" class="text-right-not-xs text-right-not-sm">
                    <h1>
                        <span class="label label-default">{$job.applied_count}</span>
                <span class="small">
                    {if $job.applied_count != 1}
                        {$translations.homepage.applicants}
                    {else}
                        {$translations.homepage.applicant}
                    {/if}
                </span>
                    </h1>
                </div>
            {/if}
        </div>
    </div>

    <div id="job-description" class="well">
        {$job.description}
    </div>

    <br />
    {if $job.apply_online && $CURRENT_PAGE != 'verify'}
        <div id="apply_online_now">
            <p><a href="#" onclick="$('#apply-online').toggle(); window.location.href = '#apply'; return false;" class="btn btn-primary">{$translations.apply.apply_message}</a></p>
        </div>
        {if $smarty.session.apply_successful AND $smarty.session.apply_successful eq -1}
            <div class="alert alert-danger">
                {if $smarty.session.apply_allowed AND $smarty.session.apply_allowed eq -1}
                    {$translator->translate("apply.error_apply_timeout_not_passed", $smarty.const.MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP)}
                {elseif $smarty.session.apply_mail_sent AND $smarty.session.apply_mail_sent eq -1}
                    {$translations.apply.error_sending_mail}
                {elseif $smarty.session.apply_errors.apply_cv}
                    {$smarty.session.apply_errors.apply_cv}
                {else}
                    {$translations.apply.errro_apply_data_invalid}
                {/if}
            </div>
        {/if}

        <div id="apply-online" {if $smarty.session.apply_successful and $smarty.session.apply_successful eq -1}style="display: block;"{else}style="display: none;"{/if} class=" panel panel-default">
            <div class="panel-body">
                <form id="frm-apply-online" method="post" enctype="multipart/form-data" class="form-horizontal" action="{$BASE_URL}apply-online/">

                    {$label_width = 3}
                    {$label_class = "col-md-`$label_width`"}
                    {$control_width = 8}
                    {$control_class = "col-md-`$control_width`"}

                    <div class="form-group {if $smarty.session.apply_errors.apply_name}has-error{/if}">
                        <label for="apply_name" class="control-label {$label_class}">{$translations.apply.name_label}</label>
                        <div class="{$control_class}">
                            <input type="text" name="apply_name" class="form-control" id="apply_name" tabindex="2" maxlength="50"  value="{$smarty.session.apply_fields.apply_name}" />
                        </div>
                    </div>

                    <div class="form-group {if $smarty.session.apply_errors.apply_email}has-error{/if}">
                        <label for="apply_email" class="control-label {$label_class}">{$translations.apply.email_label}</label>
                        <div class="{$control_class}">
                            <input type="email" name="apply_email" class="form-control" id="apply_email" tabindex="2" maxlength="50"  value="{$smarty.session.apply_fields.apply_email}" />
                        </div>
                    </div>

                    <div class="form-group {if $smarty.session.apply_errors.apply_message}has-error{/if}">
                        <label for="apply_msg" class="control-label {$label_class}">{$translations.apply.message_label}</label>
                        <div class="{$control_class}">
                            <textarea name="apply_msg" id="apply_msg" class="form-control" cols="60" rows="15">{$smarty.session.apply_fields.apply_msg}</textarea>
                        </div>
                    </div>

                    <div class="form-group {if $smarty.session.apply_errors.apply_cv}has-error{/if}">
                        <label for="apply_cv" class="control-label {$label_class}">{$translations.apply.cv_label}</label>
                        <div class="{$control_class}">
                            <input type="file" name="apply_cv" class="form-control" id="apply_cv" />
                            <div class="help-block">{$translations.apply.cv_info}</div>
                        </div>
                    </div>

                    {if $ENABLE_RECAPTCHA}
                        <div class="form-group">
                            <label class="control-label {$label_class}">>Anti-Spam</label>
                            <div class="{$control_class}">
                                {literal}
                                    <script type="text/javascript">
                                        var RecaptchaOptions = {
                                            theme : 'white',
                                            tabindex : 9
                                        };
                                    </script>
                                {/literal}
                                {$the_captcha} <span class="validation-error">{if $smarty.session.apply_errors.captcha}
                                                <img src="{$BASE_URL}_tpl/{$THEME}/img/icon-delete.png" alt="" /> {$smarty.session.apply_errors.captcha}{/if}</span>
                            </div>
                        </div>
                    {/if}

                    <div class="form-group">
                        <div class="{$control_class} col-md-offset-{$label_width}">
                            <button type="submit" class="btn btn-primary">{$translations.apply.submit}</button>
                            {$translations.apply.or}
                            <a href="#" onclick="$('#apply-online').toggle(); return false;" class="">{$translations.apply.cancel}</a>
                        </div>
                    </div>
                    <input type="hidden" name="job_id" id="job_id" value="{$job.id}" />
                </form>
            </div>
        </div>
    {/if}
    {include file="includes/company-posts-loop.tpl"}
</div>

{literal}
<script type="text/javascript">
    $(function() {
        {/literal}
        {if $smarty.session.apply_successful and $smarty.session.apply_successful eq -1}
        {literal}
        var $apply_name = $("#apply_name");
        if ($apply_name.length > 0) {
            window.location.href = "#apply";
            $apply_name.focus();
        }
        {/literal}
        {/if}
        {literal}
        $("#frm-apply-online").validate({
            rules: {
                apply_name: { required: true },
                apply_email: { required: true, email: true },
                apply_msg: { required: true },
                apply_cv: { required: true, extension: "pdf|rtf|doc|odt|docx" }
            }
        });
    });
</script>
{/literal}