<?php 

    // remove until church sets up google calendar 6/21/17

    // require_once get_template_directory() . '/scripts/php/gcal-events.php';

    // $gcalEvents = new DPI_GCAL_Events();
    // $gcalEvents->setApiKey('AIzaSyBGl_q6VJl6KOWyLI5C6Fs3lJuLlO_iLIk');
    // $gcalEvents->setCalendarId('a4tem59n6tg1mgac5j0457orq8@group.calendar.google.com');
    // $gcalEvents->setMaxEvents(4);
    // $events = $gcalEvents->getEvents();

    // $eventsMarkup = '<ul class="home-news--calendar_list">';

    // foreach($events as $event) {
    //     $date = '';

    //     if (property_exists($event->start, 'date')) {
    //         $date = $event->start->date;
    //     } else if (property_exists($event->start, 'dateTime')) {
    //         $date = $event->start->dateTime;
    //     }

    //     $eventsMarkup .= '
    //         <li class="home-news--calendar_item">
    //             <div class="home-news--calendar_item-date">
    //                 <p class="home-news--calendar_item-date_numeral">' . date('d', strtotime($date)) . '</p>
    //                 <p class="home-news--calendar_item-date_month">' . date('M.', strtotime($date)) . '</p>
    //             </div>
    //             <div class="home-news--calendar_item-details">
    //                 <p class="home-news--calendar_item-details_title font-yk">' . wp_trim_words($event->summary, 3, '...') . '</p>
    //                 <a href="/event-calendar/" class="home-news--calendar_item-details_link font-bold">View More ></a>
    //             </div>
    //         </li>
    //     ';
    // }

    // $eventsMarkup .= '</ul>';

    // <div class="home-news--events">
    //         <span class="home-news--calendar_heading">
    //             <p class="home-news--calendar_heading_title font-yk">Coming Up</p>
    //             <a href="/event-calendar/" class="home-news--calendar_heading_link font-bold">View Full Calendar ></a>
    //         </span>
    //         <?php echo $eventsMarkup
    //     </div>

?>

<section class="home-news">
    <div class="container">
        <div class="home-news--posts">
            <span class="home-news--posts_heading">
                <p class="home-news--posts_heading_title font-yk">Parish News</p>
                <a href="/news/" class="home-news--posts_heading_link font-bold">View All News ></a>
            </span>
            <?php echo do_shortcode('[dpi_news]'); ?>
        </div>
    </div>
</section>