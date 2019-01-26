<?php
/**
 * Template Name: Welcome Template
 */

 $welcomeComponents = [
    'welcome-intro',
    'welcome-banner',
    'welcome-cta',
    'welcome-locations',
    'welcome-parents'
 ];

 get_template_part('partials/page-header');

?>

<article>
    <?php foreach($welcomeComponents as $comp) { ?>
        <?= get_template_part('partials/' . $comp) ?>
    <?php } ?>
</article>