        </div>
            <div class="col-sm-4 col-md-3 col-lg-3">
                {include file="includes/sidebar.tpl"}
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            {if $navigation.footer}
                {foreach from=$navigation.footer item=item}
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        {if $item.children}
                            <ul class="list-unstyled">
                                {foreach from=$item.children item=subitem}
                                    <li><a href="{if $subitem.outside != 1}{$BASE_URL}{/if}{$subitem.url}{if ($subitem.outside != 1) && ($subitem.url != '')}/{/if}" title="{$subitem.title}" >{$subitem.name}</a></li>
                                {/foreach}
                            </ul>
                        {/if}
                    </div>
                {/foreach}
            {/if}
            <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-2 text-right">
                <p>
                    {$translations.footer.powered_by}
                    <a href="http://www.jobberbase.com/" title="open source job board software">jobberBase</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{$BASE_URL}_tpl/{$THEME}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!--[if !IE]><script src="{$BASE_URL}js/jquery.history.js" type="text/javascript"></script><![endif]-->
<script src="{$BASE_URL}js/jquery.form.js" type="text/javascript"></script>
<script src="{$BASE_URL}js/jquery.metadata.js" type="text/javascript"></script>
<script src="{$BASE_URL}_tpl/{$THEME}/vendor/jquery.validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="{$BASE_URL}_tpl/{$THEME}/vendor/jquery.validation/dist/additional-methods.min.js" type="text/javascript"></script>
<script src="{$BASE_URL}_tpl/{$THEME}/vendor/jquery.validation/src/localization/messages_{$lang_code}.js" type="text/javascript"></script>
<script src="{$BASE_URL}js/functions.js" type="text/javascript"></script>

<script type="text/javascript">
    $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    {if $editor}
    Jobber.InitEditor();
    {/if}
    {literal}

    $(function()
    {
        Jobber.I18n = {/literal}{$translationsJson}{literal};

        var keywords = $('#keywords');

        // setup search box
        keywords.bind('click', function() {
            if (this.value == '{/literal}{$translations.search.default}{literal}')
            {
                keywords.clearFields();
            }
        });

        keywords.bind('blur', function() {
            if (this.value == '{/literal}{$translations.search.default}{literal}' || this.value == '')
            {
                this.value = '{/literal}{$translations.search.default}{literal}';
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
                window.search_timer = setTimeout(function(){Jobber.PerformSearch('{/literal}{$BASE_URL}{literal}search/{/literal}{$current_category}{literal}|', searchKeywords)}, 800);
            }
        });
    });

    Jobber.jobber_url = "{/literal}{$BASE_URL}{literal}";
    {/literal}
</script>

{if $smarty.const.GOOGLE_ANALYTICS_CODE}
    <script type="text/javascript">
        {literal}
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '{/literal}{$smarty.const.GOOGLE_ANALYTICS_CODE}{literal}']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
        {/literal}
    </script>
{/if}
</body>
</html>