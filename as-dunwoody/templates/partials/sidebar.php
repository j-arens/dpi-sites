<?php

    $parent = wp_get_post_parent_id(get_the_ID());

    $relatedPages = [];

    if ($parent) {

        $relatedPages = get_posts([
            'post_type' => 'page',
            'numberposts' => -1,
            'post_status' => 'publish',
            'post_parent' => $parent
        ]);

        array_unshift($relatedPages, get_post($parent));
    }

    $news = get_posts([
        'post_type' => 'post',
        'numberposts' => 3,
        'post_status' => 'publish'
    ]);

?>

<div class="sidebar__inner">
    <?php if (!empty($relatedPages)): ?>
        <span class="sidebar__related-links-title font-bold">
            Related Pages
        </span>
        <ul class="sidebar__pages">
            <?php foreach($relatedPages as $index => $page): ?>
                <?php if (!empty($page->post_content)): ?>
                    <li class="sidebar__pages-item <?= get_the_ID() === $page->ID ? 'sidebar__pages-item--current' : '' ?>">
                        <a href="<?= esc_url(get_page_link($page->ID)) ?>" class="sidebar__link"><?= $page->post_title ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if (!empty($news)): ?>
        <div class="sidebar__related-links">
            <span class="sidebar__related-links-title font-bold">
                News & Events
            </span>
            <ul class="sidebar__related-links-list">
                <?php foreach($news as $newsItem): ?>
                    <li class="sidebar__related-links-item">
                        <a href="<?= esc_url(get_page_link($newsItem->ID)) ?>" class="sidebar__link"><?= $newsItem->post_title ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
