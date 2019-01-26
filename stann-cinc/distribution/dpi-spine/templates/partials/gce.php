<?php

    $gce = new Spine\scripts\php\GCE();
    $gce->setApiKey('AIzaSyAdng6-r84PUNjjOdhsHbltrKFU3x-HfEo');
    $gce->setCalendarId('stjohnjackson.org_hqd7snaolsncm9q2t12hgh2c5g@group.calendar.google.com');
    $gce->setMaxEvents(4);
    $gceEvents = $gce->getEvents();

?>

<section class="gce">
    <div class="gce__container mw-container">
        <?php if(!empty($gceEvents)): ?>
            <ul class="gce__list">
                <?php foreach($gceEvents as $event) { ?>
                    <li class="gce__event">
                        <a href="<?= $event->htmlLink ?>" target="_blank" rel="noopener" class="gce__link">
                            <div class="gce__date">
                                <span class="gce__day"><?= date('j', $gce->getDate($event)) ?></span>
                                <span class="gce__month"><?= date('M', $gce->getDate($event)) ?></span>
                            </div>
                            <div class="gce__event-details">
                                <p class="gce__title"><?= wp_trim_words($event->summary, 3, '...') ?></p>
                                <?php if ($gce->hasDateTime($event, 'start')): ?>
                                    <p class="gce__time">
                                        <?php
                                            $start = date('D', strtotime($event->start->dateTime));
                                            $start .= ', ' . date('F', $gce->getDate($event));
                                            $start .= ', ' . date('j', $gce->getDate($event));
                                            $start .= ' ' . date('g:i a', strtotime($event->start->dateTime));
                                            echo $start;
                                        ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <a href="#" class="gce__full-cal-link">
                <?= get_template_part('svg/plus-circ') ?>
                Full
                <br>
                Calendar
            </a>
        <?php else: ?>
            <p class="gce__empty">There aren't any calendar events right now. Pleae check back later.</p>
        <?php endif; ?>
    </div>
</section>