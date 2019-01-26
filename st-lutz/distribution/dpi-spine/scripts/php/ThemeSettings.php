<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    public function contactInfoFields() {
        $headerTemplate = '
            <# if (link_title) { #>
                {{ link_title }}
            <# } #>
        ';

        $fields = [
            'contact_info' => [
                Field::make('text', 'church_name', 'Church Name'),
                Field::make('text', 'street', 'Street'),
                Field::make('text', 'city', 'City'),
                Field::make('text', 'state', 'State'),
                Field::make('text', 'zip_code', 'ZIP Code'),
                Field::make('text', 'phone_number', 'Phone'),
                Field::make('text', 'fax_number', 'Fax')
            ],
            'social_links' => [
                Field::make('text', 'facebook_url', 'Facebook'),
                Field::make('text', 'twitter_url', 'Twitter'),
                Field::make('text', 'vimeo_url', 'Vimeo')
            ],
            'quick_links' => [
                Field::make('complex', 'quick_links', 'Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(5)
                    ->add_fields('Quick Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link_url', 'Link URL')
                    ])
                    ->set_header_template($headerTemplate)
            ]
        ];

        return Container::make('theme_options', 'Theme Settings')
            ->add_tab('Contact Info', $fields['contact_info'])
            ->add_tab('Social Links', $fields['social_links'])
            ->add_tab('Quick Links', $fields['quick_links']);
    }
}

$themeSettings = new ThemeSettings();