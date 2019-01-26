<?php 

    $contactInfo = [
        'address' => get_post_meta(37, 'Address', true),
        'address_fallback' => '1729 Stop 30 Rd Hendersonville, TN 37075',
        'email' => get_post_meta(37, 'Email Address', true),
        'email_fallback' => 'contact@ololcc.org',
        'facebook' => get_post_meta(37, 'Facebook', true),
        'facebook_fallback' => 'https://www.facebook.com/OurLadyoftheLakeTN/',
        'fax' => get_post_meta(37, 'Fax Number', true),
        'fax_fallback' => '(615) 824-7989',
        'phone' => get_post_meta(37, 'Phone Number', true),
        'phone_fallback' => '(615) 824-3276',
        'twitter' => get_post_meta(37, 'Twitter', true),
        'twitter_fallback' => 'https://twitter.com/ololccTN'
    ];

?>

<article class="contact">
    <div class="contact-container">
        <div class="contact-info">
            <p class="contact-info__title font-yk">Address</p>
            <p class="contact-info__address">
                <?php echo (empty($contactInfo['address']) ? $contactInfo['address_fallback'] : $contactInfo['address']); ?>
            </p>
            <ul class="contact-info__list">
                <li class="contact-info__list-item contact-info__phone">
                    <a href="tel:<?php echo (empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']); ?>" class="contact-info__list-item_link">
                        <?php echo (empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']); ?>
                    </a>
                </li>
                <li class="contact-info__list-item contact-info__fax">
                    <a href="fax:<?php echo (empty($contactInfo['fax']) ? $contactInfo['fax_fallback'] : $contactInfo['fax']); ?>" class="contact-info__list-item_link">
                        <?php echo (empty($contactInfo['fax']) ? $contactInfo['fax_fallback'] : $contactInfo['fax']); ?>
                    </a>
                </li>
                <li class="contact-info__list-item contact-info__email">
                    <a href="mailto:<?php echo (empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']); ?>" class="contact-info__list-item_link">
                        <?php echo (empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']); ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="contact-form">
            <?php echo do_shortcode('[contact-form-7 id="94" title="Contact Form"]'); ?>
        </div>
    </div>
</article>