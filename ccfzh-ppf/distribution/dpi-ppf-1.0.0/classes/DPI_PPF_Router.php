<?php

// prevent direct access
if ( !defined( 'ABSPATH' ) ) exit;

class DPI_PPF_Router {

    private $endpoint;
    private $endpointQuerySlug;
    private $queryVars = [];
    private $parserCB;

    /**
    * Set the endpoint
    */
    public function setEndpoint($str) {
        if (gettype($str) === 'string') {
            $slug = str_replace('/[ _]+/g', '-', $str);
            $this->endpoint = $str;
            $this->endpointQuerySlug = $slug;
            $this->queryVars[] = $slug;
        } else {
            throw new Exception('DPI_PPF_INIT: Property "endpoint" must be a string, you passed a(n)' . gettype($str) . '.');
            return false;
        }
    }

    /**
    * Set query vars
    */
    public function setQueryVars($vars) {
        if (gettype($vars) === 'array') {
            foreach($vars as $var) {
                $this->queryVars[] = $var;
            }
        } else {
            throw new Exception('DPI_PPF_INIT: Property "queryVars" must be an array, you passed a(n)' . gettype($arr) . '.');
            return false;
        }
    }

    /**
    * Set the path to the custom template to load when a user visits the set endpoint
    */
    public function setParserCB($func) {
        if (is_callable($func)) {
            $this->parserCB = $func;
        } else {
            throw new Exception('DPI_PPF_INIT: Property "parserCB" must be a function, you passed a(n)' . gettype($func) . '.');
        }
    }

    /**
    * Run wp hooks
    */
    public function runSetup() {
        if (count(array_filter(get_object_vars($this))) === 4) {
            add_action('init', [$this, '_addRewrites']);
            add_filter('query_vars', [$this, '_addQueryVars']);
            add_action('parse_request', [$this, '_parseRequest']);
        } else {
            throw new Exception('DPI_PPF_INIT: You must set the endpoint, queryVars, and templatePath properties before running setup.');
            return false;
        }
    }

    /**
    * Add a rule to redirect 'site-url/endpoint'
    */
    public function _addRewrites() {
        add_rewrite_rule($this->endpoint . '$', 'index.php?' . $this->endpointQuerySlug . '=1', 'top');
        flush_rewrite_rules();
    }

    /**
    * Register custom url query vars with wp
    */
    public function _addQueryVars($vars) {
        return array_merge($vars, $this->queryVars);
    }

    /**
    * Parse incoming requests for the endpoint slug and redirect to the appropiate file
    */
    public function _parseRequest(&$wp) {
        if (array_key_exists($this->endpointQuerySlug, $wp->query_vars)) {
            call_user_func($this->parserCB, $wp->query_vars);
            exit();
        }

        return;
    }
}