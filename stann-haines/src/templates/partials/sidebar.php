<?php 

    $massTimes = [
        [
            'day' => get_theme_mod('dpi_sidebar_mass_times_1_day_0026'),
            'day_fallback' => 'Saturday',
            'time' => get_theme_mod('dpi_sidebar_mass_times_1_times_0027'),
            'time_fallback' => '9:00 am, 4:00 pm - Vigil'
        ],
        [
            'day' => get_theme_mod('dpi_sidebar_mass_times_2_day_0028'),
            'day_fallback' => 'Sunday',
            'time' => get_theme_mod('dpi_sidebar_mass_times_2_times_0029'),
            'time_fallback' => '7:30, 10:00 am, 12:00 and 7:00 pm (spanish)'
        ],
        [
            'day' => get_theme_mod('dpi_sidebar_mass_times_3_day_0030'),
            'day_fallback' => 'Monday - Thursday',
            'time' => get_theme_mod('dpi_sidebar_mass_times_3_times_0031'),
            'time_fallback' => '9:00 am'
        ],
        [
            'day' => get_theme_mod('dpi_sidebar_mass_times_4_day_0031'),
            'day_fallback' => 'Friday',
            'time' => get_theme_mod('dpi_sidebar_mass_times_4_times_0032'),
            'time_fallback' => '7:00 am (spanish) - First Friday of the month, Benediction 6:45 pm, Mass at 7:00, 9:00 am'
        ]
    ];

?>

<aside class="page-sidebar">
    <div class="sidebar-mass-times">
        <p class="sidebar-mass-times--title font-light">
            Mass Times
        </p>
        <ul class="sidebar-mass-times--container">
            <?php 
                foreach($massTimes as $massTime) {
                    echo '
                        <li class="sidebar-mass-times--item">
                            <p class="sidebar-mass-times--item_day font-light">' . (empty($massTime['day']) ? $massTime['day_fallback'] : $massTime['day']) . '</p>
                            <p class="sidebar-mass-times--item_time font-bold">' . (empty($massTime['time']) ? $massTime['time_fallback'] : $massTime['time']) . '</p>
                        </li>
                    ';
                }
            ?>
        </ul>
    </div>
    <div class="sidebar-calendar">
        <p class="sidebar-calendar--title font-light">
            Calendar
        </p>
        <div class="calendar-placeholder">
            <?php echo do_shortcode('[calendar id="4"]'); ?>
        </div>
    </div>
</aside>
