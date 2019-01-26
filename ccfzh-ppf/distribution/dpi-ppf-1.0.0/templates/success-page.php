<div id="dpi-forms__root">

    <!-- wrapper -->
    <div class="dpi-forms__wrapper">

        <!-- noscript -->
        <noscript>
            <p>This form requires Javascript to be enabled.</p>
            <p>Please visit <a href="http://www.enable-javascript.com/" target="_blank">this website</a> if you are unsure of what to do.</p>
        </noscript>
        <!-- /noscript -->

        <!-- success page content -->
        <div class="dpi-forms__success-page">
            <div class="dpi-forms__success-page_heading">
                <img src="<?php echo plugins_url('../images/ccfzh-ppf-logo.png', __FILE__); ?>" alt="CCFZH Logo" class="dpi-forms__success-page_logo">
                <p class="dpi-forms__success-page_title">Thank you very much for investing in our Lakeshore Catholic Community!</p>
            </div>
            <div class="dpi-forms__success-page_redirect">
                <p class="dpi-forms__success-page_redirect-text">
                    You will be redirected to the homepage in 
                    <span class="dpi-forms__success-page_redirect-counter">5</span>
                    second(s) or you can
                    <a class="dpi-forms__success-page_redirect-link" href="<?php echo esc_url(home_url('/')); ?>">click here</a>
                    to go there now.
                </p>
            </div>
        </div>
        <!-- /success page content -->

    </div>
    <!-- /wrapper -->

</div>

<?php

global $wp;
$id = $wp->query_vars['donationID'];

wp_enqueue_style(
    'dpi-ppf-reset-css', 
    plugins_url('../css/reset.css', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'css/reset.css'), 
    'all'
);

wp_enqueue_style(
    'dpi-ppf-form-css', 
    plugins_url('../css/success-page.css', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'css/success-page.css'), 
    'all'
);

wp_enqueue_script(
    'dpi-ppf-form-js', 
    plugins_url('../js/success-page.js', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'js/success-page.js'), 
    true
);

wp_footer();

?>

<script>
    window.dpiPPFSuccessPage.init({
        namespace: '.dpi-forms__',
        id: '<?php echo $id ?>',
        homeURL: '<?php echo esc_url(home_url('/')) ?>',
        ajaxURL: '<?php echo admin_url('admin-ajax.php') ?>'
    });
</script>