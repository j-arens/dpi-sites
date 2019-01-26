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

    private function genLinkField($prefix) {
        return [
            Field::make('text', $prefix . '_link_url', 'Link URL')
        ];
    }

    public function featuredLinkFields() {
        return Container::make('post_meta', 'Featured Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Mass Times', $this->genLinkField('mass_times'))
            ->add_tab('Calendar', $this->genLinkField('calendar'))
            ->add_tab('Formed', $this->genLinkField('formed'))
            ->add_tab('Flocknote', $this->genLinkField('flocknote'))
            ->add_tab('Giving', $this->genLinkField('giving'))
            ->add_tab('Live Stream', $this->genLinkField('live_stream'));
    }

    public function videoLinkFields() {
        $fields = [
            Field::make('text', 'video_embed_iframe', 'Video Embed Code')
        ];

        return Container::make('post_meta', 'Video')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    private function genSecondaryLinkField($id) {
        return [
            Field::make('text', 'secondary_link_'.$id.'_text', 'Link Text'),
            Field::make('relationship', 'secondary_link_'.$id.'_page_link', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];
    }

    public function secondaryLinkFields() {
        return Container::make('post_meta', 'Seconday Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Link 1', $this->genSecondaryLinkField(1))
            ->add_tab('Link 2', $this->genSecondaryLinkField(2))
            ->add_tab('Link 3', $this->genSecondaryLinkField(3));
    }
}

$homeFields = new HomeFields();