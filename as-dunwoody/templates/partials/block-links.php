<?php

    $blocks = [
        [
            'title' => 'Mass Schedule',
            'icon' => 'bell',
            'excerpt' => carbon_get_the_post_meta('block_link_mass_schedule_excerpt'),
            'link' => carbon_get_the_post_meta('block_link_mass_schedule_link_url'),
            'newTab' => carbon_get_the_post_meta('block_link_mass_schedule_open_in_new_tab')
        ],
        [
            'title' => 'Bulletin',
            'icon' => 'bible',
            'excerpt' => carbon_get_the_post_meta('block_link_bulletin_excerpt'),
            'link' => carbon_get_the_post_meta('block_link_bulletin_link_url'),
            'newTab' => carbon_get_the_post_meta('block_link_bulletin_open_in_new_tab')
        ],
        [
            'title' => 'Donations',
            'icon' => 'giving',
            'excerpt' => carbon_get_the_post_meta('block_link_donations_excerpt'),
            'link' => carbon_get_the_post_meta('block_link_donations_link_url'),
            'newTab' => carbon_get_the_post_meta('block_link_donations_open_in_new_tab')
        ],
        [
            'title' => 'Join Parish',
            'icon' => 'welcome',
            'excerpt' => carbon_get_the_post_meta('block_link_join_parish_excerpt'),
            'link' => carbon_get_the_post_meta('block_link_join_parish_link_url'),
            'newTab' => carbon_get_the_post_meta('block_link_join_parish_open_in_new_tab')
        ],
    ];

?>

<section class="block-links">
    <div class="mw-container-lg block-links__container">
        <?php foreach($blocks as $block): ?>
            <a href="<?= esc_url($block['link']) ?>" <?= $block['newTab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?>  class="block-links__link">
                <?= get_template_part('svg/' . $block['icon']) ?>
                <span class="block-links__link-title font-medium"><?= $block['title'] ?></span>
                <p class="block-links__link-excerpt">
                    <?= $block['excerpt'] ?>
                </p>
            </a>
        <?php endforeach; ?>
    </div>
</section>