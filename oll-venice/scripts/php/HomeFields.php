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

    private function genBigLink($id) {
        return [
            Field::make('text', $id . '_link_url', 'Link URL'),
            Field::make('checkbox', $id . '_new_tab', 'Open Link in new tab')->set_option_value('yes')
        ];
    }

    public function bigLinkFields() {
        return Container::make('post_meta', 'Button Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Mass Times', $this->genBigLink('mass_times'))
            ->add_tab('Bulletins', $this->genBigLink('bulletins'))
            ->add_tab('Calendar', $this->genBigLink('calendar'));
    }

    public function introFields() {
        $linksHeaderTemplate = '
            <# if (title) { #>
                {{ title }}
            <# } #>
        ';

        $fields = [
            Field::make('textarea', 'home_intro_msg', 'Intro Message'),
            Field::make('complex', 'home_intro_links', 'Intro Links')
                ->set_layout('tabbed-vertical')
                ->set_max(2)
                ->add_fields('Link', [
                    Field::make('text', 'title', 'Button Title'),
                    Field::make('text', 'url', 'Button URL'),
                    Field::make('checkbox', 'new_tab', 'Open in new tab')->set_option_value('yes')
                ])
                ->set_header_template($linksHeaderTemplate),
            Field::make('text', 'home_intro_video_url', 'Intro Youtube Video' )
        ];

        return Container::make('post_meta', 'Intro')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    public function quoteSliderFields() {
        $fields = [
            Field::make('complex', 'quote_slider_quotes', 'Quotes')
                ->set_layout('tabbed-vertical')
                ->set_max(10)
                ->add_fields('Quote', [
                    Field::make('textarea', 'content', 'Quote Content'),
                    Field::make('text', 'citation', 'Quote Author')
                ])
        ];

        return Container::make('post_meta', 'Quote Slider')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    public function calendarFields() {
        $fields = [
            Field::make('text', 'home_calendar_api_key', 'API Key'),
            Field::make('text', 'home_calendar_cal_id', 'Calendar ID'),
            Field::make('text', 'home_calendar_link', 'View Full Calendar Link URL'),
            Field::make('checkbox', 'home_calendar_open_in_new_tab', 'Open in new tab')->set_option_value('yes')
        ];

        return Container::make('post_meta', 'Calendar')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    public function bannerFields() {
        $fields = [
            Field::make('image', 'home_banner_img', 'Banner Image'),
            Field::make('textarea', 'home_banner_content', 'Banner Message'),
            Field::make('text', 'home_banner_btn_text', 'Button Text'),
            Field::make('text', 'home_banner_btn_link', 'Button Link URL'),
            Field::make('checkbox', 'home_banner_open_in_new_tab', 'Open in new tab')->set_option_value('yes')
        ];

        return Container::make('post_meta', 'Banner')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

}

$homeFields = new HomeFields();