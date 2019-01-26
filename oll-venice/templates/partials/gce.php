<?php

    $apiKey = carbon_get_the_post_meta('home_calendar_api_key');
    $calId = carbon_get_the_post_meta('home_calendar_cal_id');

    date_default_timezone_set('America/Detroit');

    $gceEvents = [];

    if (class_exists('\\Spine\\scripts\\php\\GCE') && !empty($apiKey) && !empty($calId)) {
        $gce = new Spine\Scripts\php\GCE();
        $gce->setApiKey($apiKey);
        $gce->setCalendarId($calId);
        $gce->setMaxEvents(4);
        $gceEvents = $gce->getEvents();
    }

    function parseDate($event) {
        if (property_exists($event->start, 'date')) {
            return strtotime($event->start->date);
        } else if (property_exists($event->start, 'dateTime')) {
            return strtotime($event->start->dateTime);
        }

        return '';
    }

?>

<div class="gce">
    <p class="home-feeds__title">
        Events
        <a 
            href="<?= esc_url(carbon_get_the_post_meta('home_calendar_link')) ?>" 
            class="gce__full-link"
            <?= carbon_get_the_post_meta('home_calendar_open_in_new_tab') === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
        >
            View Full Calendar >
        </a>
    </p>
    <ul class="gce__list">
        <?php if(!empty($gceEvents)): ?>
            <?php foreach($gceEvents as $event) { ?>
                <li class="gce__item">
                    <div class="gce__date">
                        <p class="gce__month"><?= date('M', parseDate($event)) ?></p> 
                        <p class="gce__day"><?= date('j', parseDate($event)) ?></p>
                    </div>
                    <div class="gce__content">
                        <a href="<?= $event->htmlLink ?>" class="gce__event" target="_blank" rel="noopener"><?= wp_trim_words($event->summary, 3, '...') ?></a>
                        <p class="gce__time"><?= date('g:i A', parseDate($event)) ?></p>
                    </div>
                </li>
            <?php } ?>
        <?php else: ?>
            <p class="gce__no-events">There aren't any events right now. Please check back later.</p>
        <?php endif; ?>
    </ul>
</div>