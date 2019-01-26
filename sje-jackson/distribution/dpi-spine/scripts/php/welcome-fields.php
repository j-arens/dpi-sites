<?php

namespace Spine\Scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class WelcomeFields extends CustomFields {

    protected $callBacks = [
        'intro',
        'banner',
        'cta',
        'locations',
        'parents'
    ];

    protected $hideEditorOn = [
        'templates/welcome.php'
    ];

    protected function intro() {
        $fields = [
            Field::make('textarea', 'welcome_intro_video', 'Video Iframe'),
            Field::make('rich_text', 'welcome_intro_content', 'Intro Message')
        ];

        return Container::make('post_meta', 'Welcome Template Intro')
            ->show_on_post_type('page')
            ->show_on_template('templates/welcome.php')
            ->add_fields($fields);
    }

    protected function banner() {
        $fields = [
            Field::make('image', 'welcome_banner_bg', 'Background Image')->set_value_type('url'),
            Field::make('rich_text', 'welcome_banner_content', 'Banner Message'),
            Field::make('text', 'welcome_banner_btn_text', 'Link Text'),
            Field::make('relationship', 'welcome_banner_btn_link', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];

        return Container::make('post_meta', 'Welcome Template Banner')
            ->show_on_post_type('page')
            ->show_on_template('templates/welcome.php')
            ->add_fields($fields);
    }

    protected function cta() {
        $fields = [
            Field::make('complex', 'welcome_cta_link_box', 'Link Box')
                ->set_layout('tabbed-vertical')
                ->set_max(1)
                ->add_fields('Link Box Content', [
                    Field::make('text', 'Title'),
                    Field::make('text', 'Sub Title'),
                    Field::make('text', 'Button Text'),
                    Field::make('relationship', 'Page To Link To')->set_max(1)->set_post_type('page')
                ]),
            Field::make('rich_text', 'welcome_cta_content', 'Content')
        ];

        return Container::make('post_meta', 'Welcome Template Call To Action')
            ->show_on_post_type('page')
            ->show_on_template('templates/welcome.php')
            ->add_fields($fields);
    }

    protected function locations() {
        $headerTemplate = '
            <# if (location_title) { #>
                {{ location_title }}
            <# } else { #>
                New Location
            <# } #>
        ';

        $fields = [
            Field::make('complex', 'welcome_locations', 'Locations')
                ->set_layout('tabbed-vertical')
                ->add_fields('Location', [
                    Field::make('text', 'location_title', 'Location Title'),
                    Field::make('map', 'Location Map'),
                    Field::make('text', 'Address'),
                    Field::make('text', 'Phone Number'),
                    Field::make('text', 'Hours')
                ])
                ->set_header_template($headerTemplate)
        ];

        return Container::make('post_meta', 'Welcome Template Locations')
            ->show_on_post_type('page')
            ->show_on_template('templates/welcome.php')
            ->add_fields($fields);
    }

    protected function parents() {
        $fields = [
            Field::make('text', 'welcome_parents_title', 'Title'),
            Field::make('complex', 'welcome_parents_items', 'Messages')
                ->set_layout('tabbed-vertical')
                ->add_fields('Message', [
                    Field::make('textarea', 'item_content', 'Message Content')
                ])
        ];

        return Container::make('post_meta', 'Welcome Template Parents')
            ->show_on_post_type('page')
            ->show_on_template('templates/welcome.php')
            ->add_fields($fields);
    }
}

$welcomeFields = new WelcomeFields();