<?php

    $Controller = Bulletins\Plugin\Controller::getInstance();
    $bulletinID = $Controller->getBulletinID();
    $bulletins = $Controller->Transport->getBulletins($bulletinID, 4);

    $tabsConfig = [
        'hash_navigation' => true
    ];

    function buildBulletinTabs(Array $bulletins) {
        return array_map(function($bulletin) {

            return [
                'title' => date('M j Y', strtotime($bulletin['date'])),
                'template' => get_template_directory() . '/templates/partials/bulletin-tab.php',
                'bulletin' => $bulletin
            ];

        }, $bulletins);
    }

?>

<article>
  <?php the_content(); ?>
    <?php if (empty($bulletins)): ?>
        <p>Sorry, there aren't any bulletins to show you right now.</p>
    <?php else: ?>
        <?= DpiTabs\Plugin\DpiTabs::getInstance('Factory')->createTabsComponent($tabsConfig, buildBulletinTabs($bulletins)) ?>
    <?php endif; ?>
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</article>