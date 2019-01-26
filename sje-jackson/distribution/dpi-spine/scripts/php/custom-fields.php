<?php

namespace Spine\Scripts\php;

use Spine\Scripts\php\AssetPath;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_map_api_key', function() {
    return 'AIzaSyCYCgRB1M8tpaZ3KFjs3XM2nH2u_hhuppA';
});

add_action('admin_head', function() {
    ?>
        <style>

            .field-holder label[for*="carbon-"] {
                background: #f5f5f5;
                display: flex !important;
                align-items: center;
                padding: 1em 0.5em !important;
                margin-bottom: 0.25em;
            }

            .carbon-drag-handle {
                background-color: aliceblue !important;
            }

            .carbon-hide-editor {
                max-height: 0;
                overflow: hidden;
                position: absolute;
            }

        </style>
    <?php
});

add_action('admin_enqueue_scripts', function() {
    $screen = get_current_screen();

    if ($screen->post_type === 'page' && $screen->base === 'post') {
        wp_enqueue_script(
            'carbon-fields-helper-js',
            assetPath('scripts/js/carbon-helper.js'),
            null,
            filemtime(get_template_directory() . '/scripts/js/carbon-helper.js'),
            true
        );
    }
});

class CustomFields {

    public function __construct() {
        if (!is_admin()) return;

        add_action('carbon_register_fields', [$this, 'registerFields']);
        add_action('admin_init', [$this, 'removeEditor']);
        add_action('admin_head', [$this, 'localizeTemplates']);
    }

    public function registerFields() {
        foreach($this->callBacks as $method) {
            $this->$method();
        }
    }

    public function localizeTemplates() {
        if (empty($this->hideEditorOn)) return;

        ?>
            <script type="text/javascript">
                if (!window.hasOwnProperty('carbonTemplates')) window.carbonTemplates = [];
                window.carbonTemplates.push(<?= json_encode($this->hideEditorOn) ?>);
            </script>
        <?php
    }

    public function removeEditor() {
        if (empty($this->hideEditorOn) || !isset($_GET['post'])) return;

        $template = get_post_meta($_GET['post'], '_wp_page_template', 1);

        if (in_array($template, $this->hideEditorOn)) {
            remove_post_type_support('page', 'editor');
        }
    }
}