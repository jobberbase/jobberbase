{include file="includes/header.tpl"}

{include file="includes/job-details.tpl"}

{if $CURRENT_PAGE == $URL_JOB}
    <hr/>
    <div id="job-bottom">
        <div class="row">
            <div id="job-post-utils" class="col-sm-6">
                <p>
                    <a href="{$back_link}" title="category home">&laquo; {$translations.notfound.back}</a><br />
                    {$translations.jobs.report_fake} <a href="#" onclick="Jobber.ReportSpam('{$BASE_URL}report-spam/', {$job.id}); return false;" title="report fake ad">{$translations.jobs.report_it}</a>
                    <span id="report-spam-response"></span><br />
                    <a href="#" onclick="Jobber.SendToFriend.showHide(); return false;" title="{$translations.recommend.title}">{$translations.recommend.title}</a>
                </p>
            </div>
            <div id="number-views" class="col-sm-6 text-right-not-xs">
                <p>
                    {$translator->translate("jobs.published_at", "<strong>`$job.created_on`</strong>")}
                    <br />
                    {$translator->translate("jobs.viewed", "<strong>`$job.views_count`</strong>")}
                </p>
            </div>
        </div>
    </div>

    <div id="send-to-friend" style="display: none;">
        <form id="frm-send-to-friend" method="post" class="form" action="{$BASE_URL}send-to-friend/">
            <div class="well">
                <div class="form-group">
                    <label for="friend_email" class="control-label">{$translations.recommend.friend_email_label}</label>
                    <input type="email" name="friend_email" class="form-control" id="friend_email" maxlength="50" />
                </div>

                <div class="form-group">
                    <label for="my_email" class="control-label">{$translations.recommend.your_email_label}</label>
                    <input type="email" name="my_email" class="form-control" id="my_email" maxlength="50" />
                </div>

                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="{$translations.recommend.submit}" />
                <span id="send-to-friend-response"></span>
            </div>
        </form>
    </div>
    {literal}
    <script type="text/javascript">
        $(function()
        {
            Jobber.SendToFriend.init();
        });
    </script>
    {/literal}
{/if}

{include file="includes/footer.tpl"}