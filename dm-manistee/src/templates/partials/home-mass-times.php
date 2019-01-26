<?php 

    $massTimesBtn = [
        'text' => get_theme_mod('dpi_homepage_mass_times_button_text_0023'),
        'text_fallback' => 'View Mass Schedule',
        'link' => get_theme_mod('dpi_homepage_mass_times_button_link_0024'),
        'link_fallback' => '/worship-and-prayer/'
    ];

    $massTimes = [
        [
            'title' => get_theme_mod('dpi_homepage_mass_times_slot_1_tite_0025'),
            'title_fallback' => 'Saturday',
            'time_1' => get_theme_mod('dpi_homepage_mass_times_slot_1_time_1_0026'),
            'time_1_fallback' => '4:00 and',
            'time_2' => get_theme_mod('dpi_homepage_mass_times_slot_1_time_2_0027'),
            'time_2_fallback' => '6:00 pm'
        ],
        [
            'title' => get_theme_mod('dpi_homepage_mass_times_slot_2_title_0028'),
            'title_fallback' => 'Sunday',
            'time_1' => get_theme_mod('dpi_homepage_mass_times_slot_2_time_1_0029'),
            'time_1_fallback' => '7:30, 9:30, and',
            'time_2' => get_theme_mod('dpi_homepage_mass_times_slot_2_time_2_0030'),
            'time_2_fallback' => '11:30 am'
        ],
        [
            'title' => get_theme_mod('dpi_homepage_mass_times_slot_3_title_0031'),
            'title_fallback' => 'Extraordinary Form',
            'time_1' => get_theme_mod('dpi_homepage_mass_times_slot_3_time_1_0032'),
            'time_1_fallback' => '3:00 pm',
            'time_2' => get_theme_mod('dpi_homepage_mass_times_slot_3_time_2_0033'),
            'time_2_fallback' => ''
        ]
    ];

?>

<section class="home-mass-times">
    <div class="container">
        <ul class="row">
            <li class="mass-time-slot col-xs-12 col-md-6 col-xl-3">
                <p class="mass-title">Mass Times</p>
                <a href="<?php echo empty($massTimesBtn['link']) ? $massTimesBtn['link_fallback'] : $massTimesBtn['link']; ?>" class="button button-primary"><?php echo empty($massTimesBtn['text']) ? $massTimesBtn['text_fallback'] : $massTimesBtn['text']; ?></a>
            </li>
            <?php 
                foreach($massTimes as $massTime) {
                    echo '
                        <li class="mass-time-slot col-xs-12 col-md-6 col-xl-3">
                            <p class="mass-day">' . (empty($massTime['title']) ? $massTime['title_fallback'] : $massTime['title']) . '</p>
                            <p class="mass-time">' . (empty($massTime['time_1']) ? $massTime['time_1_fallback'] : $massTime['time_1']) . '</p> 
                            <p class="mass-time">' . (empty($massTime['time_2']) ? $massTime['time_2_fallback'] : $massTime['time_2']) . '</p>
                        </li>
                    ';
                }
            ?>
        </ul>
    </div>
</section>