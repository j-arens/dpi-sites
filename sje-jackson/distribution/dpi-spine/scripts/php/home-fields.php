<?php

namespace Spine\Scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class HomeFields extends CustomFields {

    protected $callBacks = [
        'homeSlider',
        'homeLinks',
        'eventsSlider',
        'calendarLink'
    ];

    protected $hideEditorOn = [
        'templates/front-page.php'
    ];

    protected function homeSlider() {
        $fields = [
            Field::Make('text', 'Home Slider Shortcode')
        ];

        return Container::make('post_meta', 'Home Slider')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    protected function eventsSlider() {
        $fields = [
            Field::Make('text', 'Events Slider Shortcode')
        ];

        return Container::make('post_meta', 'Events Slider')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    protected function homeLinks() {
        $icons = [
            'blurb' => 'Speech Blurb',
            'bible' => 'Bible',
            'giving' => 'Giving',
            'alarm' => 'Alarm',
            'anchor' => 'Anchor',
            'basket' => 'Basket',
            'bell' => 'Bell',
            'article' => 'Article',
            'blog' => 'Blog',
            'briefcase' => 'Briefcase',
            'calendar' => 'Calendar',
            'camera' => 'Camera'
        ];

        $fields = [
            Field::make('complex', 'Links')
                ->set_layout('tabbed-vertical')
                ->set_max(3)
                ->add_fields('Link', [
                    Field::make('image', 'Thumbnail'),
                    Field::make('select', 'Icon')->add_options($icons),
                    Field::make('text', 'Title'),
                    Field::make('textarea', 'Excerpt')->set_rows('4'),
                    Field::make('relationship', 'Page To Link To')->set_post_type('page')->set_max(1),
                    Field::make('text', 'Link Text')
                ])
        ];

        return Container::make('post_meta', 'Featured Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    protected function calendarLink() {
        $fields = [
            Field::make('text', 'calendar_link_text', 'Calendar Link Text'),
            Field::make('relationship', 'calendar_page_link', 'Page To Link To')->set_post_type('page')->set_max(1)
        ];

        return Container::make('post_meta', 'Calendar Page link')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }
}

$homeFields = new HomeFields();