<?php

// remove vc from admin bar
add_action('admin_bar_menu', function() {
    remove_action('admin_bar_menu', [vc_frontend_editor(), 'adminBarEditLink'], 1000);
});

add_action('admin_head', function() {
    if (!isset($_GET['post'])) return;

    $template = get_post_meta($_GET['post'], '_wp_page_template', true);

    if ($template === 'templates/front-page.php') {
        echo '
            <style id="dpi-disable-vc-switch">

                #wpb_visual_composer {
                    display: none !important;
                }

                .composer-switch {
                    display: none !important; 
                    pointer-events: none !important;
                }

            </style>
        ';
    }
});