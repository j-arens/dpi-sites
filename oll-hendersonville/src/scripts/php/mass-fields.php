<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_register_fields', function() {
    if (!is_admin()) return;

    $days = [
        'sunday' => 'Sunday',
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday'
    ];

    $categories = [
        'weekday' => 'Weekday',
        'weekend' => 'Weekend',
        'spanish' => 'Spanish'
    ];

    $labels = [
        'plural_name' => 'Mass Times',
        'singular_name' => 'Mass Time'
    ];

    $headerTemplate = '
        <# if (mass_day && mass_time) { #>
            {{ mass_day }} {{ mass_time }}
        <# } else { #>
            New Mass Time
        <# } #>
    ';

    $fields = [
        Field::make('complex', 'mass_times', 'Mass Times')
            ->set_layout('tabbed-vertical')
            ->setup_labels($labels)
            ->add_fields([
                Field::make('select', 'mass_day', 'Mass Day')->set_required(true)->add_options($days),
                Field::make('time', 'mass_time', 'Mass Time')->set_required(true)->set_time_format('h:mm tt')->set_timepicker_options(['showSecond' => false]),
                Field::make('select', 'mass_type', 'Mass Category')->set_required(true)->add_options($categories)
            ])
            ->set_header_template($headerTemplate)
    ];

    return Container::make('theme_options', 'Mass Times')->add_fields($fields);
});