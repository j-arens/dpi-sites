<?php

add_action('admin_head', function() {
    $template = substr(get_page_template(), strrpos(get_page_template(), '/') + 1);
    if ($template === 'template_contact.php') {
        remove_post_type_support('page', 'editor');
    }
});