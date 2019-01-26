<?php

// prevent direct access
if ( !defined( 'ABSPATH' ) ) exit;

require_once dirname(__FILE__) . '/DPI_PPF_Router.php';
require_once dirname(__FILE__) . '/DPI_PPF_Email.php';

class DPI_PPF {

    private $router;
    private $email;

    public function __construct() {
        $this->email = new DPI_PPF_Email();
        $this->router = new DPI_PPF_Router();
        
        // have to call these hooks asap because wordpress hates developers
        if (is_admin()) {
            add_action('wp_ajax_dpi_ppf_form_values', [$this, 'onSubmissionCB']);
            add_action('wp_ajax_nopriv_dpi_ppf_form_values', [$this, 'onSubmissionCB']);
        }
    }

    /**
    * Configure router
    */
    public function configRouter($arr) {
        if (gettype($arr) === 'array') {
            $this->router->setEndpoint($arr['endpoint']);
            $this->router->setQueryVars($arr['queryVars']);
            $this->router->setParserCB($arr['parserCallback']);
            $this->router->runSetup();
        } else {
            throw new Exception('DPI_PPF: configRouter expects an array. You passed a(n)' . gettype($arr) . '.');
            return false;
        }
    }

    /**
    * Configure email
    */
    public function configEmail($arr) {
        if (gettype($arr) === 'array') {
            $this->email->setRecipients($arr['recipients']);
            $this->email->setMailFromName($arr['fromName']);
            $this->email->setFromDomain($arr['fromDomain']);
            $this->email->runSetup();
        } else {
            throw new Exception('DPI_PPF: configEmail expects an array. You passed a(n)' . gettype($arr) . '.');
            return false;
        }
    }

    /**
    * Ajax callback
    */
    public function onSubmissionCB() {
        $this->email->sendMail(json_decode(stripslashes($_POST['formValues']), true));
        wp_die();
    }
}