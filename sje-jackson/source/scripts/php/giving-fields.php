<?php

namespace Spine\Scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class GivingFields extends CustomFields {

    protected $callBacks = [
        'intro',
        'ctas',
        'banner',
        'outro'
    ];

    protected $hideEditorOn = [
        'templates/giving.php'
    ];

    protected function intro() {
        $fields = [
            Field::make('image', 'giving_intro_image', 'Image')->set_value_type('url'),
            Field::make('rich_text', 'giving_intro_content', 'Intro Message')
        ];

        return Container::make('post_meta', 'Giving Template Intro')
            ->show_on_post_type('page')
            ->show_on_template('templates/giving.php')
            ->add_fields($fields);
    }

    protected function ctas() {
        $icons = [
            'money-slash' => 'Money Slash',
            'money' => 'Money',
            'sign-up' => 'Sign Up',
            'blurb' => 'Speech Blurb',
            'badge-check' => 'Badge Check',
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
            Field::make('complex', 'giving_cta_items', 'Call To Action Boxes')
                ->set_layout('tabbed-vertical')
                ->set_max(3)
                ->add_fields('Call To Action', [
                    Field::make('select', 'Icon')->add_options($icons),
                    Field::make('textarea', 'Content'),
                    Field::make('text', 'Button Title'),
                    Field::make('text', 'Button Link URL')
                ])
        ];

        return Container::make('post_meta', 'Giving Template Call To Action\'s')
            ->show_on_post_type('page')
            ->show_on_template('templates/giving.php')
            ->add_fields($fields);
    }

    protected function banner() {
        $fields = [
            Field::make('image', 'giving_banner_bg', 'Background Image')->set_value_type('url'),
            Field::make('rich_text', 'giving_banner_content', 'Banner Message'),
            Field::make('text', 'giving_banner_btn_text', 'Button Text'),
            Field::make('text', 'giving_banner_btn_link', 'Button Link URL')
        ];

        return Container::make('post_meta', 'Giving Template Banner')
            ->show_on_post_type('page')
            ->show_on_template('templates/giving.php')
            ->add_fields($fields);
    }

    protected function outro() {
        $fields = [
            Field::make('rich_text', 'giving_Outro_content', 'Outro Message'),
            Field::make('image', 'giving_Outro_image', 'Image')->set_value_type('url')
        ];

        return Container::make('post_meta', 'Giving Template Outro')
            ->show_on_post_type('page')
            ->show_on_template('templates/giving.php')
            ->add_fields($fields);
    }
}

$givingFields = new GivingFields();