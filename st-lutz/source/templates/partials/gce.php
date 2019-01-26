<?php

    $calendar = new Spine\scripts\php\CalendarFeed();
    $feed = $calendar->getCalenderEvents();
    $feed = $calendar->parseFeed($feed);    

?>

<div class="gce">
    <?php if(!empty($feed)): ?>
        <ul class="gce__list">
            <?php foreach($feed as $event) { ?>
                <li class="gce__event">
                    <a href="<?= $event['link'] ?>" class="gce__event-link" target="_blank" rel="noopener">
                        <div class="gce__date">
                            <p class="gce__month"><?= $event['month'] ?></p>
                            <p class="gce__day"><?= $event['day'] ?></p>
                        </div>
                        <div class="gce__content">
                            <p class="gce__title"><?= wp_trim_words($event['title'], 3, '...') ?></p>
                            <p class="gce__time">
                                <?= $event['start'] ?>
                                <?= !empty($event['end']) ? ' - ' . $event['end'] : '' ?>
                            </p>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <a href="/calendar/" class="gce__full-link btn">Full Calendar</a>
    <?php else: ?>
        <p>Sorry, there aren't any events right now.</p>
    <?php endif; ?>
</div>