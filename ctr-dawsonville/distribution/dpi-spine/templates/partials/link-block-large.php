<?php 

    $linksDefaults = [
        'welcome' => '/about-us',
        'being_catholic' => '/being-catholic',
        'news' => '/news'
    ];

    $linksFields = [
        'welcome' => get_field('welcome_button_link'),
        'being_catholic' => get_field('being_catholic_button_link'),
        'news' => '/news'
    ];

    $links = dpiMergeFields($linksDefaults, $linksFields);

?>

<div class="big-links">
    <a href="<?=esc_url($links['welcome'])?>" class="big-links__btn pulse-btn-lt">
        <?php get_template_part('svg/crosses-circle'); ?>
        <p class="big-links__btn-text">Welcome</p>
    </a>
    <a href="<?=esc_url($links['being_catholic'])?>" class="big-links__btn pulse-btn-lt">
        <?php get_template_part('svg/commandments-circle'); ?>
        <p class="big-links__btn-text">Being Catholic</p>
    </a>
    <a href="<?=esc_url($links['news'])?>" class="big-links__btn pulse-btn-lt">
        <?php get_template_part('svg/newspaper-circle'); ?>
        <p class="big-links__btn-text">Parish News</p>
    </a>
</div>