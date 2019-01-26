<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    public function settingsFields() {
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
                Field::make('text', 'fax_number', 'Fax'),
                Field::make('text', 'church_email', 'Email')
            ],
            'social_links' => [
                Field::make('text', 'facebook_url', 'Facebook'),
                Field::make('text', 'twitter_url', 'Twitter'),
                Field::make('text', 'instagram_url', 'Instagram'),
                Field::make('text', 'mpa_deep_link', 'My Parish App Deep Link')
            ],
            'quick_links' => [
                Field::make('complex', 'homepage_quick_links', 'Homepage Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(6)
                    ->add_fields('Quick Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link_url', 'Link URL'),
                        Field::make('checkbox', 'new_tab', 'Open Link in new tab')->set_option_value('yes')
                    ])
                    ->set_header_template($headerTemplate),
                Field::make('complex', 'sidebar_quick_links', 'Sidebar Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(3)
                    ->add_fields('Quick Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link_url', 'Link URL'),
                        Field::make('checkbox', 'new_tab', 'Open Link in new tab')->set_option_value('yes')
                    ])
                    ->set_header_template($headerTemplate)
            ],
            'giving' => [
                Field::make('text', 'giving_url', 'Online Giving Link'),
                Field::make('checkbox', 'giving_new_tab', 'Open Link in new tab')->set_option_value('yes')
            ]
        ];

        return Container::make('theme_options', 'Theme Settings')
            ->add_tab('Contact Info', $fields['contact_info'])
            ->add_tab('Social Links', $fields['social_links'])
            ->add_tab('Quick Links', $fields['quick_links'])
            ->add_tab('Online Giving', $fields['giving']);
    }
}

$themeSettings = new ThemeSettings();