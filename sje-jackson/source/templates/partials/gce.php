<?php

    date_default_timezone_set('America/Detroit');

    $gce = new Spine\Scripts\php\GCE();
    $gce->setApiKey('AIzaSyAdng6-r84PUNjjOdhsHbltrKFU3x-HfEo');
    $gce->setCalendarId('stjohnjackson.org_hqd7snaolsncm9q2t12hgh2c5g@group.calendar.google.com');
    $gce->setMaxEvents(4);
    $gceEvents = $gce->getEvents();

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
    <p class="home-feeds__title">Events</p>
    <ul class="gce__list">
        <?php if(!empty($gceEvents)): ?>
            <?php foreach($gceEvents as $event) { ?>
                <li class="gce__item">
                    <div class="gce__date">
                        <p class="gce__day"><?= date('j', parseDate($event)) ?></p>
                        <p class="gce__month"><?= date('M', parseDate($event)) ?></p> 
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
    <a href="<?= get_page_link(carbon_get_post_meta(get_the_ID(), 'calendar_page_link')[0]) ?>" class="gce__page-link">
        <?= carbon_get_post_meta(get_the_ID(), 'calendar_link_text') ?>
    </a>
</div>