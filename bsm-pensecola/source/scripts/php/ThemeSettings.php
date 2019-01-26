<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    public function headerFooterFields() {
        $headerTemplate = '
            <# if (link_title) { #>
                {{ link_title }}
            <# } #>
        ';

        $fields = [
            'header' => [
                Field::make('image', 'site_logo_image', 'Logo'),
                Field::make('text', 'nrhp_link', 'National Register of Historic Places Link'),
                Field::make('text', 'facebook_link', 'Facebook Page Link'),
                Field::make('text', 'twitter_link', 'Twitter Page Link'),
                Field::make('text', 'mpa_link', 'My Parish App Link')
            ],
            'footer' => [
                Field::make('image', 'footer_bg_img', 'Background Image'),
                Field::make('textarea', 'footer_diocese_info', 'Diocese Info'),
                Field::make('textarea', 'footer_safe_env', 'Safe Environment Info'),
                Field::make('text', 'footer_safe_env_link', 'Safe Environment Link'),
                Field::make('complex', 'footer_quick_links', 'Quick Links')
                    ->set_layout('tabbed-vertical')
                    ->set_max(8)
                    ->add_fields('Quick Link', [
                        Field::make('text', 'link_title', 'Link Title'),
                        Field::make('text', 'link', 'Link URL')
                    ])
                    ->set_header_template($headerTemplate)
            ],
            'contact' => [
                Field::make('text', 'contact_physical_address_street', 'Physical Address Street'),
                Field::make('text', 'contact_physical_address_csz', 'Physical Address City, State, ZIP'),
                Field::make('text', 'contact_mailing_address_po', 'Mailing Address PO'),
                Field::make('text', 'contact_mailing_address_csz', 'Mailing Address City, State, ZIP'),
                Field::make('text', 'contact_phone_number', 'Phone Number'),
                Field::make('text', 'contact_fax_number', 'Fax Number')
            ]
        ];

        return Container::make('theme_options', 'Theme Settings')
            ->add_tab('Header', $fields['header'])
            ->add_tab('Footer', $fields['footer'])
            ->add_tab('Contact Info', $fields['contact']);
    }
}

$themeSettings = new ThemeSettings();