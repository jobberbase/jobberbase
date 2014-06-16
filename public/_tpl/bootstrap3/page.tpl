{include file="includes/header.tpl"}


<div class="page-header">
    <h2>{$page.title}</h2>
</div>

{$page.content}

<br/>

{if $page.has_form == '1'}
    {if $errors}
        <div class="alert alert-danger">
            {$errors.contact_error}
        </div>
    {elseif $smarty.session.contact_msg_sent}
        <div class="alert alert-success">
            {$page.form_message}
        </div>
    {/if}

    {if !$smarty.session.contact_msg_sent}
        <div id="contact-form">
            <div id="contact-form-contents">
                <form id="apply-online" method="post" enctype="multipart/form-data" class="form" action="{$BASE_URL}{$page.url}/">

                    <div class="form-group {if $errors.contact_name}has-error{/if}">
                        <label for="contact_name" class="control-label">{$translations.contact.name_label}</label>
                        <input class="form-control" type="text" name="contact_name" id="contact_name" maxlength="50" size="30" value="{$smarty.post.contact_name}" />
                    </div>

                    <div class="form-group {if $errors.contact_email}has-error{/if}">
                        <label for="contact_email" class="control-label">{$translations.contact.email_label}</label>
                        <input class="form-control" type="email" name="contact_email" id="contact_email" maxlength="50" size="30" value="{$smarty.post.contact_email}" />
                    </div>

                    <div class="form-group {if $errors.contact_msg}has-error{/if}">
                        <label for="contact_msg" class="control-label">{$translations.contact.message_label}</label>
                        <textarea class="form-control" name="contact_msg" id="contact_msg" cols="50" rows="8">{$smarty.post.contact_msg}</textarea>
                    </div>

                    {if $page.accepts_files }
                        <div class="form-group {if $errors.contact_attach}has-error{/if}">
                            <label for="contact_email" class="control-label">{$translations.contact.attachment_label}</label>
                            <input class="form-control" type="file" name="contact_attach" id="contact_attach" />
                        </div>
                    {/if}

                    {if $ENABLE_RECAPTCHA}
                        <br /><br />
                        <label for="recaptcha_response_field">{$translations.captcha.captcha_title}:</label><br />
                        {literal}
                            <script type="text/javascript">
                                var RecaptchaOptions = {
                                    theme : 'white',
                                    tabindex : 9
                                };
                            </script>
                        {/literal}
                        {$the_captcha}
                        <span class="validation-error">{if $errors.captcha}<img src="{$BASE_URL}_tpl/{$THEME}/img/icon-delete.png" alt="" /> {$errors.captcha}{/if}</span>
                    {/if}

                    <button type="submit" class="btn btn-primary">{$translations.contact.submit}</button>
                </form>
            </div>
        </div>
    {/if}
{/if}

{if $page.has_form }
    {literal}
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#apply-online").validate({
                    rules: {
                        contact_name: { required: true },
                        contact_email: { required: true, email: true },
                        contact_msg: { required: true }
                    }
                });
            });
        </script>
    {/literal}
{/if}

{include file="includes/footer.tpl"}
