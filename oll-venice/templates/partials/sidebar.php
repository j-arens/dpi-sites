<?php

    $newsLinks = get_posts([
        'post_type' => 'news',
        'numberposts' => 4
    ]);

    $quickLinks = carbon_get_theme_option('sidebar_quick_links', true);

?>

<div class="sidebar__container">
    <div class="sidebar__parish-news">
        <?php if (!empty($newsLinks)): ?>
            <h3 class="sidebar__title">Parish News</h3>
            <ul class="sidebar__parish-news_list">
                <?php foreach($newsLinks as $post): ?>
                    <li class="sidebar__parish-news_list-item">
                        <a href="<?= esc_url(get_the_permalink($post->ID)) ?>" class="sidebar__parish-news_link">
                            <?= wp_trim_words(get_the_title($post), 5, '...') ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php if (!empty($quickLinks)): ?>
        <div class="sidebar__btns">
            <h3 class="sidebar__title">Quick Links</h3>
            <?php foreach($quickLinks as $link): ?>
                <a 
                    href="<?= esc_url($link['link_url']) ?>" 
                    class="sidebar__btns-link pulse-btn-lt"
                    <?= $link['new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                >
                    <p class="sidebar__btns-link_title"><?= $link['link_title'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
