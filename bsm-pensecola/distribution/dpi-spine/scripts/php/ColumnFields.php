<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ColumnFields extends CustomFields {

    public $hideEditorOn = [
        'templates/two-column.php',
        'templates/three-column.php'
    ];

    public function twoColFields() {
        $fields = [
            Field::make('rich_text', 'column_1', 'Column 1'),
            Field::make('rich_text', 'column_2', 'Column 2')
        ];

        return Container::make('post_meta', 'Columns')
            ->show_on_post_type('page')
            ->show_on_template('templates/two-column.php')
            ->add_fields($fields);
    }

    public function threeColFields() {
        $fields = [
            Field::make('rich_text', 'column_1', 'Column 1'),
            Field::make('rich_text', 'column_2', 'Column 2'),
            Field::make('rich_text', 'column_3', 'Column 3')
        ];

        return Container::make('post_meta', 'Columns')
            ->show_on_post_type('page')
            ->show_on_template('templates/three-column.php')
            ->add_fields($fields);
    }
}

$columnFields = new ColumnFields();