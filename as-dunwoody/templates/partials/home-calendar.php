<?php

    $apiKey = carbon_get_the_post_meta('home_calendar_api_key') ?: false;
    $calID = carbon_get_the_post_meta('home_calendar_cal_id') ?: false;

    if ($apiKey && $calID) {

        date_default_timezone_set('America/Detroit');

        $calendar = new Spine\scripts\php\Calendar();
        $calendar->end = strtotime('+5 days');
        
        $calendar->feedInterface->apiKey = $apiKey;
        $calendar->feedInterface->calendarID = $calID;
        $calendar->feedInterface->timezone = 'America/Detroit';
        $calendar->feedInterface->endTime = strtotime('+ 1 week');
        $calendar->feedInterface->maxEvents = 100;
        
        $calendar->events = $calendar->feedInterface->sortEventsByDate($calendar->feedInterface->getEvents());
        $calendar->events = $calendar->normalizeEventDates($calendar->events, 'Y-m-d');
        $calendar->dates = $calendar->appendEventsToDates($calendar->events, $calendar->range, 'Y-m-d');

    }

?>

<section class="home-calendar">
    <div class="mw-container-lg home-calendar__container">
        <?php if ($apiKey && $calID): ?>
            <?= $calendar->renderTemplate(get_template_directory() . '/templates/partials/weekly-calendar.php') ?>
        <?php else: ?>
            <p class="home-calendar__error">Unable to connect to the calendar. Please check the calendar settings in the dashboard.</p>
        <?php endif; ?>
        <a 
            href="<?= esc_url(carbon_get_the_post_meta('home_calendar_link')) ?>" 
            <?= carbon_get_the_post_meta('home_calendar_open_in_new_tab') === 'yes' ? 'target="_blank" rel="noopener"' : '' ?>
            class="home-calendar__full-link btn btn--center">
                View All
            </a>
    </div>
</section>