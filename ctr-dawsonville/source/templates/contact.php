<?php
/**
 * Template Name: Contact Us Template
 */

    $contactDefaults = [
        'road' => '991 Kilough Church Rd.',
        'city_state_zip' => 'Dawsonville, GA 30534',
        'phone_number' => '(706) 265-1361',
        'emergency_number' => 'Sacramental Emergencies: (706) 265-0093',
        'email' => 'office@ctrcc.net',
        'form_shortcode' => '[contact-form-7 id="72" title="Contact Form"]'
    ];

    $contactFields = [
        'road' => get_field('contact_road'),
        'city_state_zip' => get_field('contact_city_state_zip'),
        'phone_number' => get_field('contact_phone_number'),
        'emergency_number' => get_field('contact_emergency_phone_number'),
        'email' => get_field('contact_email_address'),
        'form_shortcode' => get_field('contact_form_shortcode')
    ];

    $contactInfo = dpiMergeFields($contactDefaults, $contactFields);

 ?>


<div class="contact__details-container">
    <div class="contact__info">
        <h1 class="contact__info-title">Address</h1>
        <p class="contact__info-road"><?=$contactInfo['road']?></p>
        <p class="contact__info-address"><?=$contactInfo['city_state_zip']?></p>
        <ul class="contact__info-list">
            <li class="contact__info-list-item contact__info-phone">
                <a href="tel:<?=$contactInfo['phone_number']?>" class="contact__info-link"><?=$contactInfo['phone_number']?></a>
            </li>
            <li class="contact__info-list-item contact__info-emergency">
                <a href="tel:<?=$contactInfo['emergency_number']?>" class="contact__info-link"><?=$contactInfo['emergency_number']?></a>
            </li>
            <li class="contact__info-list-item contact__info-email">
                <a href="mailto:<?=$contactInfo['email']?>" class="contact__info-link"><?=$contactInfo['email']?></a>
            </li>
        </ul>
    </div>
    <div class="contact__form">
        <h1 class="contact__form-title">Get a hold of us</h1>
        <?=do_shortcode($contactInfo['form_shortcode'])?>
    </div>
</div>
<div class="contact__map-container">
    <?=do_shortcode('[dpi_maps]')?>
</div>