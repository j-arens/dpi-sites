<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeSettings extends CustomFields {

    public function footerFields() {
        $headerTemplate = '
            <# if (link_title) { #>
                {{ link_title }}
            <# } #>
        ';

        $fields = [
            'contact' => [
                Field::make('text', 'church_name', 'Church Name'),
                Field::make('text', 'street', 'Street'),
                Field::make('text', 'city', 'City'),
                Field::make('text', 'state', 'State'),
                Field::make('text', 'zip_code', 'ZIP Code'),
                Field::make('text', 'phone_number', 'Phone'),
                Field::make('text', 'fax_number', 'Fax'),
                Field::make('text', 'email', 'Email')
            ],
            'connect' => [
                Field::make('text', 'facebook_link', 'Facebook'),
                Field::make('text', 'instagram_link', 'Instagram'),
                Field::make('text', 'flocknote_link', 'Flocknote'),
                Field::make('text', 'pinterest_link', 'Pinterest'),
            ],
            'bulletin_store' => [
                Field::make('text', 'bulletin_link_text', 'Bulletin Button Text'),
                Field::make('text', 'bulletin_link_url', 'Bulletin Button URL'),
                Field::make('text', 'store_link_text', 'Store Button Text'),
                Field::make('text', 'store_link_url', 'Store Button URL')
            ],
            'photo_gallery' => [
                Field::make('text', 'gallery_shortcode', 'Photo Gallery Shortcode'),
                Field::make('text', 'gallery_link_text', 'Gallery Button Text'),
                Field::make('text', 'gallery_link_url', 'Gallery Button URL')
            ]
        ];

        return Container::make('theme_options', 'Footer Settings')
            ->add_tab('Contact', $fields['contact'])
            ->add_tab('Connect', $fields['connect'])
            ->add_tab('Bulletin & Store', $fields['bulletin_store'])
            ->add_tab('Photo Gallery', $fields['photo_gallery']);
    }
}

new ThemeSettings();