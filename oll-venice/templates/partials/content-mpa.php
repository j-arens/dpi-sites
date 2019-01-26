<?php

    $messages = MyParishApp\Classes\getMpaMessages(4);

    $tabsConfig = [
        'hash_navigation' => true
    ];

    function buildMpaTabs(Array $messages) {
        $tabs = array_map(function($message) {

            return [
                'title' => date('M j Y', strtotime($message->post_date)),
                'template' => get_template_directory() . '/templates/partials/mpa-tab.php',
                'message' => $message
            ];

        }, $messages);

        array_unshift($tabs, [
            'title' => 'MyParish App',
            'template' => get_template_directory() . '/templates/partials/mpa-promo-tab.php',
            'deepLink' => get_option('myparish_app_deep_link') ?: 'https://myparishapp.net'
        ]);

        return $tabs;
    }

?>

<article>
    <?php the_content(); ?>
    <?php if(empty($messages)): ?>
        <p>Sorry, there aren't any app messages to show you right now.</p>
    <?php else: ?>
        <?= DpiTabs\Plugin\DpiTabs::getInstance('Factory')->createTabsComponent($tabsConfig, buildMpaTabs($messages)) ?>
    <?php endif; ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</article>