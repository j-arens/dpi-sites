<?php

    $bigLinks = [
        [
            'title' => 'Mass Times',
            'icon' => 'bell',
            'url' => carbon_get_the_post_meta('mass_times_link_url'),
            'new_tab' => carbon_get_the_post_meta('mass_times_new_tab')
        ],
        [
            'title' => 'Bulletins',
            'icon' => 'book',
            'url' => carbon_get_the_post_meta('bulletins_link_url'),
            'new_tab' => carbon_get_the_post_meta('bulletins_new_tab')
        ],
        [
            'title' => 'Calendar',
            'icon' => 'calendar',
            'url' => carbon_get_the_post_meta('calendar_link_url'),
            'new_tab' => carbon_get_the_post_meta('calendar_new_tab')
        ]
    ];

?>

<section class="big-links">
    <div class="big-links__container mw-container">
        <?php foreach($bigLinks as $link): ?>
            <a 
                href="<?= esc_url($link['url']) ?>" 
                class="big-links__btn pulse-btn-lt"
                <?= $link['new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?>
            >
                <?php get_template_part('svg/' . $link['icon']); ?>
                <p class="big-links__btn-text"><?= $link['title'] ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>
