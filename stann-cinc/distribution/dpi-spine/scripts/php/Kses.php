<?php

class Kses {

    private $filters = ['content_save_pre', 'content_filtered_save_pre'];
    private $allowedTags;

    /**
    * Constructor, set the $allowedTags prop, swap the save filters
    */
    public function __construct() {
        $this->swapFilters();
        $this->allowedTags = wp_kses_allowed_html('post');
    }

    /**
    * Remove default wp actions, add our own
    */
    private function swapFilters() {
        foreach($this->filters as $filter) {
            remove_filter($filter, 'wp_filter_post_kses');
            add_filter($filter, [$this, 'dpiFilterPostKses']);
        }
    }

    /**
    * Add tags to allowedTags
    * @param {array} $tags
    */
    public function addAllowedTags(array $tags) {
        if (gettype($tags) !== 'array') {
            return $this->triggerTypeError(__METHOD__, 'array');
        }

        foreach($tags as $tag => $attributes) {
            $this->allowedTags[$tag] = $attributes;
        }
    }

    /**
    * Remove tags from allowedTags
    * @param {array} $tags
    */
    public function removeAllowedTags(array $tags) {
        if (gettype($tags) !== 'array') {
            return $this->triggerTypeError(__METHOD__, 'array');
        }

        if (!empty($this->allowedTags)) {
            foreach($tags as $tag) {
                if (array_key_exists($tag, $this->allowedTags)) {
                    unset($this->allowedTags[$tag]);
                }
            }
        }
    }

    /**
    * Runs on the content_save_pre_ filters, sanitize post data
    * @param {string} $data 
    */
    public function dpiFilterPostKses($data) {
        return addslashes(wp_kses(stripslashes($data), $this->allowedTags));
    }

    /**
    * Alert user of type errors
    * @param {function} {string} $fn
    * @param {string} $allowedType
    */
    private function triggerTypeError($fn, $allowedType) {
        trigger_error(sprintf('Invalid data type. %1s expects a(n) %2s.', $fn, $allowedType), E_USER_WARNING);
    }
}

// run it
add_action('init', function() {
    $sanitizePosts = new Kses();
    $sanitizePosts->addAllowedTags([
        'iframe' => [
            'src' => [],
            'height' => [],
            'width' => [],
            'frameborder' => [],
            'allowfullscreen' => []
        ]
    ]);
});