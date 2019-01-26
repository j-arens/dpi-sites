<?php 

    $linksDefaults = [
        'daily_reading' => '#',
        'calendar' => '#',
        'bulletins' => '#',
        'online_giving' => '#',
        'catholic_links' => '#',
        'join_parish' => '#',
        'homilies' => '#',
        'sacraments' => '#'
    ];

    $linksFields = [
        'daily_reading' => get_field('daily_reading_button_link'),
        'calendar' => get_field('calendar_button_link'),
        'bulletins' => get_field('bulletins_button_link'),
        'online_giving' => get_field('online_giving_button_link'),
        'catholic_links' => get_field('catholic_links_button_link'),
        'join_parish' => get_field('join_the_parish_button_link'),
        'homilies' => get_field('homilies_button_link'),
        'sacraments' => get_field('sacraments_button_link')
    ];

    $links = dpiMergeFields($linksDefaults, $linksFields);

?>

<div class="medium-links">
    <div class="medium-links__row">
        <a href="<?=esc_url($links['daily_reading'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/bible-circle'); ?>
            <p class="medium-links__btn-title">Daily Reading</p>
        </a>
        <a href="<?=esc_url($links['calendar'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/calendar-circle'); ?>
            <p class="medium-links__btn-title">Calendar</p>
        </a>
        <a href="<?=esc_url($links['bulletins'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/open-book-circle'); ?>
            <p class="medium-links__btn-title">Bulletins</p>
        </a>
        <a href="<?=esc_url($links['online_giving'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/giving-circle'); ?>
            <p class="medium-links__btn-title">Online Giving</p>
        </a>
    </div>
    <div class="medium-links__row">
        <a href="<?=esc_url($links['catholic_links'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/link-circle'); ?>
            <p class="medium-links__btn-title">Catholic Links</p>
        </a>
        <a href="<?=esc_url($links['join_parish'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/group-circle'); ?>
            <p class="medium-links__btn-title">Join the Parish</p>
        </a>
        <a href="<?=esc_url($links['homilies'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/podium-circle'); ?>
            <p class="medium-links__btn-title">Homilies</p>
        </a>
        <a href="<?=esc_url($links['sacraments'])?>" class="medium-links__btn pulse-btn-dk">
            <?php get_template_part('svg/dove-circle'); ?>
            <p class="medium-links__btn-title">Sacraments</p>
        </a>
    </div>
</div>