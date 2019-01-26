<div class="dpi-cal__root">
    <span class="dpi-cal__title font-bold"><?= carbon_get_the_post_meta('home_calendar_title') ?></span>
    <hr class="dpi-cal__divider">
    <div class="dpi-cal__week-container">
        <?php foreach($this->dates as $date): ?>
            <div class="dpi-cal__day-container">
                <div class="dpi-cal__day-heading">
                    <span class="dpi-cal__day-numeral font-medium"><?= $date->format('j') ?></span>
                    <div class="dpi-cal__heading-titles">
                        <p class="dpi-cal__day"><?= $date->format('l') ?></p>
                        <p class="dpi-cal__month font-medium"><?= $date->format('F') ?></p>
                    </div>
                </div>
                <?php if (property_exists($date, 'events')): ?>
                    <ul class="dpi-cal__day-events">
                        <?php foreach($date->events as $event): ?>
                            <li class="dpi-cal__event-item">
                                <span class="dpi-cal__event-start"><?= date('g:i a', $this->feedInterface->getStartDateTimestamp($event)) ?></span>
                                <p class="dpi-cal__event-heading font-black">
                                    <?= wp_trim_words($this->feedInterface->getEventName($event), 3, '...') ?>
                                </p>
                                <div class="dpi-cal__event-time">
                                    <span class="dpi-cal__event-start"><?= date('g:i a', $this->feedInterface->getStartDateTimestamp($event)) ?></span>
                                    -
                                    <span class="dpi-cal__event-end"><?= date('g:i a', $this->feedInterface->getEndDateTimestamp($event)) ?></span>
                                </div>
                                <p class="dpi-cal__location"><?= wp_trim_words($this->feedInterface->getEventLocation($event), 4, '...') ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="dpi-cal__no-events">No events scheduled for this day.</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>


