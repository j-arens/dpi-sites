<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class HomeFields extends CustomFields {

    public $hideEditorOn = [
        'templates/front-page.php'
    ];

    public function sliderFields() {
        $fields = [
            Field::make('text', 'home_slider_shortcode', 'Slider Shortcode')
        ];

        return Container::make('post_meta', 'Slider')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    public function massTimesFields() {
        $fields = [
            Field::make('text', 'mass_times_content_1', 'Mass Time 1'),
            Field::make('text', 'mass_times_content_2', 'Mass Time 2')
        ];

        return Container::make('post_meta', 'Mass Times')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }
    
    public function featuredLinksFields() {
        $fields = [
            'mass_schedule' => [
                Field::make('text', 'mass_schedule_text', 'Text'),
                Field::make('text', 'mass_Schedule_link', 'Link URL')
            ],
            'bulletin' => [
                Field::make('text', 'bulletin_text', 'Text'),
                Field::make('text', 'bulletin_link', 'Link URL')
            ],
            'prayer_requests' => [
                Field::make('text', 'prayer_request_text', 'Text'),
                Field::make('text', 'prayer_request_link', 'Link URL')
            ],
            'join_parish' => [
                Field::make('text', 'join_parish_text', 'Text'),
                Field::make('text', 'join_parish_link', 'Link URL')
            ]
        ];

        return Container::make('post_meta', 'Featured Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Mass Schedule', $fields['mass_schedule'])
            ->add_tab('Bulletin', $fields['bulletin'])
            ->add_tab('Prayer Requests', $fields['prayer_requests'])
            ->add_tab('Join Parish', $fields['join_parish']);
    }

    public function bannerLinkFields() {
        $fields = [
            Field::make('text', 'giving_link_text', 'Text'),
            Field::make('text', 'giving_link_url', 'Link URL')
        ];

        return Container::make('post_meta', 'Giving Link')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    public function mediaCenterFields() {
        $fields = [
            'formed' => [
                Field::make('image', 'formed_featured_img', 'Featured Image'),
                Field::make('text', 'formed_link_url', 'Link URL')
            ],
            'fr_malleys_blog' => [
                Field::make('image', 'fr_malleys_blog_featured_img', 'Featured Image'),
                Field::make('text', 'fr_malleys_blog_link_url', 'Link URL')
            ],
            'newsletter' => [
                Field::make('image', 'newsletter_featured_img', 'Featured Image'),
                Field::make('text', 'newsletter_link_url', 'Link URL')
            ],
            'fr_kevins_blog' => [
                Field::make('image', 'fr_kevins_blog_featured_img', 'Featured Image'),
                Field::make('text', 'fr_kevins_blog_link_url', 'Link URL')
            ]
        ];

        return Container::make('post_meta', 'Media Center')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('FORMED', $fields['formed'])
            ->add_tab('Fr. Malley\'s Blog', $fields['fr_malleys_blog'])
            ->add_tab('Newsletter', $fields['newsletter'])
            ->add_tab('Fr. Kevin\'s Blog', $fields['fr_kevins_blog']);
    }
}

$homeFields = new HomeFields();