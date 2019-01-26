<?php

/*
Plugin Name: DPI Donation Form
Plugin URI: http://www.diocesan.com
Description: Custom paypal donation form for CCFZH.
Version: 1.0.0
Author: Josh Arens
Author URI: http://www.diocesan.com
License: GPL2
*/

// prevent direct access
if ( !defined( 'ABSPATH' ) ) exit;

require_once dirname(__FILE__) . '/classes/DPI_PPF.php';

add_action('init', function() {
    $dpiPaypalForm = new DPI_PPF();

    $dpiPaypalForm->configEmail([
        'fromName' => 'Online Donation Form',
        'fromDomain' => 'donation@ccfoundationhz.com',
        'recipients' => ['jarens@diocesan.com']
    ]);

    $dpiPaypalForm->configRouter([
        'endpoint' => 'donate-form',
        'queryVars' => ['paymentSuccess', 'donationID'],
        'parserCallback' => function($queries) {
            if (array_key_exists('paymentSuccess', $queries)) {
                if (array_key_exists('donationID', $queries)) {
                    include dirname(__FILE__) . '/templates/success-page.php';
                } else {
                    wp_redirect(esc_url(home_url('/')));
                }
            } else {
                include dirname(__FILE__) . '/templates/form.php';
            }
        }
    ]);
});

