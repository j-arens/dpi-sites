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

    private function genLinkField($id ) {
        if (!$id) return;

        return [
            Field::make('image', 'featured_link_'.$id.'_img', 'Image'),
            Field::make('text', 'featured_link_'.$id.'_title', 'Title'),
            Field::make('text', 'featured_link_'.$id.'_addr', 'Link URL'),
            Field::make('checkbox', 'featured_link_'.$id.'_tab', 'Open Link in new tab')->set_option_value('yes')
            // Field::make('relationship', 'featured_link_'.$id.'_url', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];
    }

    public function featuredLinksFields() {
        return Container::make('post_meta', 'Featured Links')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Featured Link 1', $this->genLinkField(1))
            ->add_tab('Featured Link 2', $this->genLinkField(2))
            ->add_tab('Featured Link 3', $this->genLinkField(3))
            ->add_tab('Featured Link 4', $this->genLinkField(4))
            ->add_tab('Featured Link 5', $this->genLinkField(5));
    }

    private function genBannerField($id) {
        if (!$id) return;

        return [
            Field::make('image', 'home_banner_'.$id.'_img', 'Image')
        ];
    }

    public function bannerImageFields() {
        return Container::make('post_meta', 'Banner Images')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Top Banner', $this->genBannerField(1))
            ->add_tab('Bottom Banner', $this->genBannerField(2));
    }

    public function mediaCenterFields() {
        $videoFields = [
            Field::make('image', 'home_video_image', 'Video Background Image'),
            Field::make('text', 'home_video_link_text', 'Link Text'),
            Field::make('relationship', 'home_video_link_url', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];

        $mpaFields = [
            Field::make('image', 'home_mpa_image', 'My Parish App Background Image'),
            Field::make('text', 'home_mpa_link_text', 'Link Text'),
            Field::make('relationship', 'home_mpa_link_url', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];

        $galleryFields = [
            Field::make('image', 'home_gallery_image', 'My Gallery Background Image'),
            Field::make('text', 'home_gallery_link_text', 'Link Text'),
            Field::make('relationship', 'home_gallery_link_url', 'Page To Link To')->set_max(1)->set_post_type('page')
        ];

        return Container::make('post_meta', 'Media Center')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Video', $videoFields)
            ->add_tab('My Parish App', $mpaFields)
            ->add_tab('Gallery', $galleryFields);
    }
}

$homeFields = new HomeFields();