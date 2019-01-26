<?php 

    $dailyDefaults = [
        [
            'mass_time_day' => 'Saturday Vigil',
            'mass_time_time' => '4:00 pm'
        ],
        [
            'mass_time_day' => 'Saturday Spanish Vigil',
            'mass_time_time' => '7:00 pm'
        ],
        [
            'mass_time_day' => 'Sunday',
            'mass_time_time' => '8:00 pm & 9:30 am'
        ],
        [
            'mass_time_day' => 'Monday',
            'mass_time_time' => 'No Mass'
        ],
        [
            'mass_time_day' => 'Tuesday - Friday',
            'mass_time_time' => '8:00 am'
        ]
    ];

    $eventDefaults = [
        [
            'mass_time_event_title' => 'Confessions',
            'mass_time_event_content' => 'Saturdays 3 - 3:35 pm or by appointment'
        ],
        [
            'mass_time_event_title' => 'Eucharistic Adoration',
            'mass_time_event_content' => 'Thursdays 8:00 am'
        ],
        [
            'mass_time_event_title' => 'Parish Rosary',
            'mass_time_event_content' => 'Sundays 7:30 am'
        ]
    ];

    $dailyTimes = array_replace($dailyDefaults, get_field('daily_mass_times'));
    $events = array_replace($eventDefaults, get_field('mass_time_events'));

?>


<div class="mass-schedule box box__bolts">
    <h2 class="box-title box-title__brown">Mass Schedule</h2>
    <ul class="mass-schedule--daily-list">
        <?php foreach($dailyTimes as $massTime) { ?>
            <li class="mass-schedule--daily-item">
                <span class="mass-schedule--daily-day"><?= $massTime['mass_time_day'] ?></span>
                <span class="mass-schedule--daily-time"><?= $massTime['mass_time_time'] ?></span>
            </li>
        <?php } ?>
    </ul>
    <ul class="mass-schedule--events-list">
        <?php foreach($events as $event) { ?>
            <li class="mass-schedule--event-item">
                <p class="mass-schedule--event-item-title"><?= $event['mass_time_event_title'] ?></p>
                <p class="mass-schedule--event-desc"><?= $event['mass_time_event_content'] ?></p>
            </li>
        <?php } ?>
    </ul>
</div>