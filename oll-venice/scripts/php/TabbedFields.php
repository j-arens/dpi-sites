<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class TabbedFields extends CustomFields {

    public $hideEditorOn = [
        'templates/tabbed-content.php'
    ];

    public function tabFields() {
        $tabHeaderTemplate = '
            <# if (title) { #>
                {{ title }}
            <# } #>
        ';

        // $icons = [
        //     'priest' => 'Priest',
        //     'sick-patient' => 'Sick Patient',
        //     'praying' => 'Praying',
        //     'cross' => 'Cross',
        //     'dove' => 'Dove',
        //     'marriage' => 'Marriage',
        //     'water-drop' => 'Water Drop'
        // ];

        $fields = [
            Field::make('complex', 'tabbed_content', 'Tabs')
                ->set_layout('tabbed-vertical')
                ->add_fields('Tab', [
                    Field::make('text', 'title', 'Title'),
                    // Field::make('select', 'icon', 'Icon')->add_options($icons),
                    Field::make('rich_text', 'content', 'Content')
                ])
                ->set_header_template($tabHeaderTemplate)
        ];

        return Container::make('post_meta', 'Tabbed Content')
            ->show_on_post_type('page')
            ->show_on_template('templates/tabbed-content.php')
            ->add_fields($fields);
    }

}

$tabbedFields = new TabbedFields();