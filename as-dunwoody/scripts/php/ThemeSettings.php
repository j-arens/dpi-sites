<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    public function themeSettingsFields() {

        $LinksheaderTemplate = '
            <# if (link_title) { #>
                {{ link_title }}
            <# } #>
        ';


        $fields = [
            'contact_info' => [
                Field::make('text', 'church_name', 'Church Name'),
                Field::make('text', 'office_hours', 'Office Hours'),
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
                Field::make('text', 'youtube_url', 'Vimeo')
            ],
            'header' => [
                Field::make('image', 'header_logo', 'Logo'),
                Field::make('complex', 'header_quick_links', 'Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(4)
                    ->add_fields('Quick Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link_url', 'Link URL'),
                        Field::make('checkbox', 'open_in_new_tab', 'Open Link in new tab')->set_option_value('yes')
                    ])
                    ->set_header_template($LinksheaderTemplate)
            ],
            'footer' => [
                Field::make('image', 'footer_logo', 'Logo'),
                Field::make('complex', 'footer_links', 'Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(16)
                    ->add_fields('Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link_url', 'Link URL'),
                        Field::make('checkbox', 'open_in_new_tab', 'Open Link in new tab')->set_option_value('yes')
                    ])
                    ->set_header_template($LinksheaderTemplate)
            ]
        ];

        return Container::make('theme_options', 'Theme Settings')
            ->add_tab('Contact Info', $fields['contact_info'])
            ->add_tab('Social Links', $fields['social_links'])
            ->add_tab('Header', $fields['header'])
            ->add_tab('Footer', $fields['footer']);
    }

}

new ThemeSettings();