{include file="includes/header.tpl"}

<ul class="pagination pagination-lg hidden-xs">
    <li class="active"><a href="#">{$translations.publish.step1}</a></li>
    <li class="disabled"><a href="#">{$translations.publish.step2}</a></li>
    <li class="disabled"><a href="#">{$translations.publish.step3}</a></li>
</ul>

{if $filter_error}
    <div class="alert alert-danger">
        {$filter_error}
    </div>
{/if}
{if $errors}
    <div class="alert alert-danger">
        {$translations.publish.form_error}
    </div>
{/if}

<form id="publish_form" method="post" class="form-horizontal" action="{$BASE_URL}post/">
    {$label_width = 2}
    {$label_class = "col-md-`$label_width`"}
    {$control_width = 8}
    {$control_class = "col-md-`$control_width`"}

    <fieldset>
        <legend>{$translations.publish.job_details}</legend>

        <div class="form-group">
            <label for="#" class="control-label {$label_class}"></label>
            <div class="{$control_class}">
                {section name=tmp2 loop=$types}
                    <div class="radio-inline">
                        <label>
                            {$checked = false}
                            {if !$job.type_id && !$smarty.post.type_id}
                                {if $smarty.section.tmp2.first}
                                    {$checked = true}
                                {/if}
                            {else}
                                {if $types[tmp2].id == $job.type_id || $types[tmp2].id == $smarty.post.type_id}
                                    {$checked = true}
                                {/if}
                            {/if}

                            {$type = $types[tmp2].var_name}
                            {if $type eq 'fulltime'}
                                {$class = 'success'}
                            {elseif $type eq 'parttime'}
                                {$class = 'info'}
                            {elseif $type eq 'freelance'}
                                {$class = 'warning'}
                            {else}
                                {$class = 'default'}
                            {/if}

                            <input type="radio" name="type_id" id="type_id_{$types[tmp2].id}" value="{$types[tmp2].id}" {if $checked}checked{/if}>
                            <span class="label label-{$class}">{$types[tmp2].name}</span>
                        </label>
                    </div>
                {/section}
            </div>
        </div>

        <div class="form-group">
            <label for="#" class="control-label {$label_class}"></label>
            <div class="{$control_class}">
                <select name="category_id" id="category_id" class="form-control">
                    {section name=tmp1 loop=$categories}
                        {$selected = false}
                        {if $default_categ_id != '' && $default_categ_id == $categories[tmp1].id}
                            {$selected = true}
                        {else}
                            {if $categories[tmp1].id == $job.category_id || $categories[tmp1].id == $smarty.post.category_id}
                                {$selected = true}
                            {/if}
                        {/if}
                        <option value="{$categories[tmp1].id}" {if $selected}selected="selected"{/if}>{$categories[tmp1].name}</option>
                    {/section}
                </select>
            </div>
        </div>

        <div class="form-group {if $errors.title}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.title_label}</label>
            <div class="{$control_class}">
                <input type="text" name="title" class="form-control" id="title" tabindex="2" size="50" value="{if $job.title}{$job.title|escape}{else}{$smarty.post.title|escape}{/if}" />
                <div class="suggestion help-block">{$translations.publish.title_info}</div>
            </div>
        </div>

        <div class="form-group {if $errors.summary}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.summary_label}</label>
            <div class="{$control_class}">
                <input type="text" name="summary" class="form-control" id="summary" tabindex="3" size="50" value="{if $job.summary}{$job.summary|escape}{else}{$smarty.post.summary|escape}{/if}" />
                <div class="suggestion help-block">{$translations.publish.summary_info}</div>
            </div>
        </div>

        <div class="form-group {if $errors.location}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.location_label}</label>
            <div class="{$control_class}">
                <select name="city_id" id="city_id" class="form-control" tabindex="4" {if $job.location_outside_ro or $smarty.post.location_outside_ro_where}disabled="disabled"{/if}>
                    <option value="0">{$translations.jobs.location_anywhere}</option>
                    {section name="c" loop=$cities}
                        <option value="{$cities[c].id}" {if $smarty.post.city_id == $cities[c].id || $job.city_id == $cities[c].id}selected="selected"{else}{if $user_city.id == $cities[c].id AND !$smarty.post.city_id AND !$job.city_id}selected="selected"{/if}{/if}>{$cities[c].name}</option>
                    {/section}
                </select>
                <a id="other_location_label" href="#" onclick="Jobber.HandleLocationOutsideRo(); return false;">{if $job.location_outside_ro or $smarty.post.location_outside_ro_where}{$translations.publish.location_pick_from_list}{else}{$translations.publish.other}{/if}</a>
                <div id="location_outside_ro" {if $job.location_outside_ro or $smarty.post.location_outside_ro_where}style="display: block;"{else}style="display: none;"{/if}>
                    <input type="text" name="location_outside_ro_where" class="form-control" id="location_outside_ro_where" size="50" maxlength="140" placeholder="{$translations.publish.where}" {if $job.location_outside_ro != ''}value="{$job.location|escape}"{/if}{if $smarty.post.location_outside_ro_where != ''}value="{$smarty.post.location_outside_ro_where|escape}"{/if} />
                    <div class="suggestion help-block">{$translations.publish.where_info}</div>
                </div>
            </div>
        </div>

        <div class="form-group {if $errors.description}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.description_label}</label>
            <div class="{$control_class}">
                <textarea class="mceEditor" tabindex="5" name="description" id="description" cols="80" rows="15">{if $job.description}{$job.description}{else}{$smarty.post.description}{/if}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="#" class="control-label {$label_class}"></label>
            <div class="{$control_class}"></div>
        </div>
    </fieldset>

    <fieldset>
        <legend>{$translations.publish.company}</legend>

        <div class="form-group {if $errors.company}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.name_label}</label>
            <div class="{$control_class}">
                <input type="text" name="company" class="form-control" id="company" tabindex="6" size="40" value="{if $job.company}{$job.company|escape}{else}{$smarty.post.company|escape}{/if}" />
            </div>
        </div>

        <div class="form-group {if $errors.text}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.website_label}</label>
            <div class="{$control_class}">
                <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    <input type="text" name="url" class="form-control" id="url" tabindex="7" size="35" value="{if $job.company}{$job.company|escape}{else}{$smarty.post.company|escape}{/if}" />
                </div>
                <div class="suggestion help-block">{$translations.publish.website_info}</div>
            </div>
        </div>

        <div class="form-group {if $errors.poster_email}has-error{/if}">
            <label for="#" class="control-label {$label_class}">{$translations.publish.email_label}</label>
            <div class="{$control_class}">
                <input type="text" name="poster_email" class="form-control" id="poster_email" tabindex="8" size="40" value="{if $job.poster_email}{$job.poster_email}{else}{$smarty.post.poster_email}{/if}" />
                <div class="suggestion help-block">{$translations.publish.email_info2} ({$translations.publish.email_info1})</div>
            </div>
        </div>
    </fieldset>

    {if $ENABLE_RECAPTCHA}
        <fieldset>
            <legend>{$translations.captcha.captcha_title}</legend>
            {literal}
                <script type="text/javascript">
                    var RecaptchaOptions = {
                        theme : 'white',
                        tabindex : 9
                    };
                </script>
            {/literal}
            {$the_captcha} <span class="validation-error">{if $errors.captcha}
                <img src="{$BASE_URL}_tpl/{$THEME}/img/icon-delete.png" alt="" /> {$errors.captcha}{/if}</span>
        </fieldset>
    {/if}

    <fieldset>
        <div class="form-group">
            <div class="{$control_class} col-md-offset-{$label_width}">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="apply_online" id="apply_online" class="no-border" {if $job.apply_online || $is_apply}checked="checked"{/if}{if !isset($job.apply_online) && !isset($is_apply)}checked="checked"{/if} />
                        {$translations.publish.apply_online}
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="{$control_class} col-md-offset-{$label_width}">
            <button type="submit" class="btn btn-primary">{$translations.publish.step1_submit}</button>
        </div>
    </fieldset>
    <fieldset class="hidden">
        <input type="hidden" name="action" {if $job.id || $smarty.session.later_edit}value="edit"{else}value="publish"{/if} />
        {if $smarty.session.later_edit}<input type="hidden" name="auth" value="{$smarty.session.later_edit}" />{/if}
        {if $job.id}<input type="hidden" name="job_id" value="{$job.id}" />{/if}
    </fieldset>
</form>


{literal}
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#title').focus();

        $("#publish_form").validate({
            rules: {
                type_id: { required: true },
                title: { required: true },
                description: { required: true },
                poster_email: { required: true, email: true }
            }
        });
    });
</script>
{/literal}

{include file="includes/footer.tpl"}