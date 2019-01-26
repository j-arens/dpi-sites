<?php

namespace Spine\Scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ColumnFields extends CustomFields {

    protected $callBacks = [
        'twoCol',
        'threeCol',
        'fourCol'
    ];

    protected $hideEditorOn = [
        'templates/two-column.php',
        'templates/three-column.php',
        'templates/four-column.php'
    ];

    protected function twoCol() {
        $fields = [
            Field::make('rich_text', 'column_1', 'Column 1'),
            Field::make('rich_text', 'column_2', 'Column 2')
        ];

        return Container::make('post_meta', 'Columns')
            ->show_on_post_type('page')
            ->show_on_template('templates/two-column.php')
            ->add_fields($fields);
    }

    protected function threeCol() {
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

    protected function fourCol() {
        $fields = [
            Field::make('rich_text', 'column_1', 'Column 1'),
            Field::make('rich_text', 'column_2', 'Column 2'),
            Field::make('rich_text', 'column_3', 'Column 3'),
            Field::make('rich_text', 'column_4', 'Column 4')
        ];

        return Container::make('post_meta', 'Columns')
            ->show_on_post_type('page')
            ->show_on_template('templates/four-column.php')
            ->add_fields($fields);
    }
}

$colFields = new ColumnFields();