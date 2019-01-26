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

    public function genBlockLinkField($id) {
        return [
            Field::make('text', 'block_link_' . $id . '_excerpt', 'Excerpt'),
            Field::make('text', 'block_link_' . $id . '_link_url', 'Link URL'),
            Field::make('checkbox', 'block_link_' . $id . '_open_in_new_tab', 'Open in new tab')->set_option_value('yes')
        ];
    }

    public function blockLinkFields() {
        return Container::make('post_meta', 'Link Blocks')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Mass Schedule', $this->genBlockLinkField('mass_schedule'))
            ->add_tab('Bulletin', $this->genBlockLinkField('bulletin'))
            ->add_tab('Donations', $this->genBlockLinkField('donations'))
            ->add_tab('Join Parish', $this->genBlockLinkField('join_parish'));
    }

    public function calendarFields() {
        $fields = [
            Field::make('text', 'home_calendar_title', 'Title'),
            Field::make('text', 'home_calendar_api_key', 'API Key'),
            Field::make('text', 'home_calendar_cal_id', 'Calendar ID'),
            Field::make('text', 'home_calendar_link', 'View All Button URL'),
            Field::make('checkbox', 'home_calendar_open_in_new_tab', 'Open in new tab')->set_option_value('yes')
        ];

        return Container::make('post_meta', 'Calendar')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    // private function getNewsCategories() {
    //     global $wpdb;

    //     $query = 'SELECT * FROM ' . $wpdb->prefix . 'terms a INNER JOIN ' . $wpdb->prefix . 'term_taxonomy b ON a.term_id = b.term_taxonomy_id WHERE b.taxonomy = "category" AND b.parent = 0';

    //     $results = $wpdb->get_results($query);

    //     return $results ? $results : [];
    // }

    private function mapCategories(Array $categories) {
        if (empty($categories)) return [];

        $mappedCategories = [];

        foreach($categories as $category) {
            $mappedCategories[$category->term_id] = $category->name; 
        }

        return $mappedCategories;
    }

    public function newsFields() {
        $categories = get_categories([
            'type' => 'post',
            'taxonomy' => 'category'
        ]);

        $fields = [
            Field::make('text', 'home_news_title', 'Title'),
            Field::make('set', 'home_news_categories', 'Linked Categories')
                // ->set_options($this->mapCategories($this->getNewsCategories()))
                ->set_options($this->mapCategories($categories))
                ->limit_options(4)
        ];

        return Container::make('post_meta', 'News & Events')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    private function genFeaturedItemField($id) {
        $buttonsHeaderTemplate = '
            <# if (featured_item_button_title) { #>
                {{ featured_item_button_title }}
            <# } #>
        ';

        return [
            Field::make('text', 'featured_item_' . $id . '_title', 'Title'),
            Field::make('image', 'featured_item_' . $id . '_thumbnail', 'Thumbnail'),
            Field::make('rich_text', 'featured_item_' . $id . '_content', 'Content'),
            Field::make('complex', 'featured_item_' . $id . '_buttons', 'Buttons')
                ->set_layout('tabbed-vertical')
                ->set_max(3)
                ->add_fields('Button', [
                    Field::make('text', 'featured_item_button_title', 'Button Title'),
                    Field::make('text', 'featured_item_button_link', 'Button URL'),
                    Field::make('checkbox', 'featured_item_button_new_tab', 'Open in new tab')->set_option_value('yes')
                ])
                ->set_header_template($buttonsHeaderTemplate)
        ];
    }

    public function featuredItemFields() {
        return Container::make('post_meta', 'Featured Items')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_tab('Item 1', $this->genFeaturedItemField('item_1'))
            ->add_tab('Item 2', $this->genFeaturedItemField('item_2'))
            ->add_tab('Item 3', $this->genFeaturedItemField('item_3'))
            ->add_tab('Item 4', $this->genFeaturedItemField('item_4'));
    }

}

new HomeFields();

