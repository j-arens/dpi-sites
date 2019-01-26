<?php

    function getSidebarEvents($quantity = 1) {
        $posts = get_posts([
            'numberposts' => $quantity,
            'post_type' => 'news',
            'post_status' => 'publish'
        ]);

        return $posts;
    }

    $events = getSidebarEvents(3);

?>

<p class="sidebar__title">Connect with us!</p>
<ul class="sidebar__links">
    <li class="sidebar__link-item">
        <a href="/mass-schedule/" class="sidebar__link">
            <?= get_template_part('svg/chalice') ?>
            <span class="sidebar__link-title">Mass Times</span>
        </a>
    </li>
    <li class="sidebar__link-item">
        <a href="/bulletin/" class="sidebar__link">
            <?= get_template_part('svg/book') ?>
            <span class="sidebar__link-title">Bulletins</span>
        </a>
    </li>
    <li class="sidebar__link-item">
        <a href="/calendar/" class="sidebar__link">
            <?= get_template_part('svg/calendar') ?>
            <span class="sidebar__link-title">Calendar</span>
        </a>
    </li>
    <li class="sidebar__link-item">
        <a href="https://www.osvonlinegiving.com/860" target="_blank" rel="noopener" class="sidebar__link">
            <?= get_template_part('svg/form') ?>
            <span class="sidebar__link-title">Donate</span>
        </a>
    </li>
</ul>
<p class="sidebar__title">Upcoming Events</p>
<?php if(!empty($events)): ?>
    <ul class="sidebar__events">
        <?php foreach($events as $event) { ?>
            <li class="sidebar__event-item">
                <a href="<?= esc_url($event->guid) ?>" class="sidebar__event-link"><?= wp_trim_words($event->post_title, '3', '...') ?></a>
            </li>
        <?php } ?>
    </ul>
    <a href="/news" class="sidebar__events-link">More Events ></a>
<?php else: ?>
    <p class="sidebar__no-events">Sorry, there aren't any events to show you right now.</p>
<?php endif; ?>
