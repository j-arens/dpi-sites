<?php

namespace Spine\Scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    protected $callBacks = [
        'baseOptions'
    ];

    protected function baseOptions() {
        $headerTemplate = '
            <# if (mass_schedule_title) { #>
                {{ mass_schedule_title }}
            <# } #>
        ';

        $fields = [
            'header' => [
                Field::make('image', 'header_logo', 'Header Logo'),
                Field::make('text', 'phone_number', 'Phone Number'),
                Field::make('text', 'facebook_page_link', 'Facebook Page')
            ],
            'footer' => [
                Field::make('complex', 'footer_mass_times', 'Mass Times')
                    ->set_layout('tabbed-vertical')
                    ->set_max(3)
                    ->add_fields('Mass Time Schedule', [
                        Field::make('text', 'mass_schedule_title', 'Title'),
                        Field::make('complex', 'mass_schedule_times', 'Mass Times')
                            ->add_fields([
                                Field::make('text', 'mass_schedule_time', 'Mass Time')
                            ])
                    ])
                    ->set_header_template($headerTemplate),
                Field::make('relationship', 'footer_mass_times_page_link', 'Mass Times Page Link')->set_post_type('page'),
                Field::make('text', 'footer_bulletins_shortcode', 'Bulletins Shortcode'),
                Field::make('relationship', 'footer_bulletins_page_link', 'Bulletins Page Link')->set_post_type('page'),
                Field::make('complex', 'footer_quick_links', 'Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->add_fields('Link', [
                        Field::make('text', 'Link Title'),
                        Field::make('relationship', 'Page')->set_post_type('page')
                    ]),
                Field::make('text', 'footer_location_street', 'Street'),
                Field::make('text', 'footer_location_csz', 'City, State, Zip'),
                Field::make('text', 'footer_location_phone', 'Phone Number'),
                Field::make('text', 'footer_contact_shortcode', 'Contact Form Shortcode'),
                Field::make('text', 'footer_contact_facebook', 'Facebook Page')
            ]
        ];

        return Container::make('theme_options', 'Theme Settings')
            ->add_tab(__('Header'), $fields['header'])
            ->add_tab(__('Footer'), $fields['footer']);
    }
}

$themeSettings = new ThemeSettings();