<?php

add_action('admin_notices', function() {
    global $pagenow;
    if ($pagenow === 'nav-menus.php') {
        printf(
            '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', 
            'Please note - Nav items nested more than two levels deep will not be displayed.'
        );
    }
});