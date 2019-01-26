<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class MinistryFields extends CustomFields {

    public $hideEditorOn = [
        'templates/ministries.php',
    ];

    public function ministriesFields() {
        $headerTemplate = '
            <# if (ministry_name) { #>
                {{ministry_name}}
            <# } else { #>
                New Ministry
            <# } #>
        ';

        $fields = [
            Field::make('rich_text', 'ministries_intro_content', 'Intro Content'),
            Field::make('complex', 'ministries_tabs', 'Ministries')
                ->set_layout('tabbed-vertical')
                ->add_fields('Ministry', [
                    Field::make('text', 'ministry_name', 'Ministry Name'),
                    Field::make('rich_text', 'ministry_content', 'Ministry Content')
                ])
                ->set_header_template($headerTemplate)
        ];

        return Container::make('post_meta', 'Ministries')
            ->show_on_post_type('page')
            ->show_on_template('templates/ministries.php')
            ->add_fields($fields);
    }
}

$ministryFields = new MinistryFields();