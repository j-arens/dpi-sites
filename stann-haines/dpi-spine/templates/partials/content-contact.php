<?php 

    $contactInfo = [
        'phone' => get_post_meta($post->ID, 'Phone Number', true),
        'phone_fallback' => '(863) 422-4370',
        'address' => get_post_meta($post->ID, 'Address', true),
        'address_fallback' => '1265 Robinson Dr, Haines City, FL 33844',
        'email'=> get_post_meta($post->ID, 'Email Address', true),
        'email_fallback' => get_post_meta($post->ID, 'luz@stannhc.org', true)
    ];

?>

<section class="content-container content-container--blue">
  <article class="page-article">
    <h1 class="page-title font-light"><?php the_title(); ?></h1>
    <div class="contact-content">
        <ul class="contact-info">
            <li class="contact-info-item contact--address">
                <div class="contact-info-item--wrapper">
                    <p class="contact-info-item--title font-bold">Address</p>
                    <p class="contact-info-item--meta font-light"><?php echo empty($contactInfo['address']) ? $contactInfo['address_fallback'] : $contactInfo['address'] ?></p>
                </div>
            </li>
            <li class="contact-info-item contact--phone">
                <div class="contact-info-item--wrapper">
                    <p class="contact-info-item--title font-bold">Phone</p>
                    <a href="tel:<?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']; ?>" class="contact-info-item--meta font-light"><?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']; ?></a>
                </div>
            </li>
            <li class="contact-info-item contact--email">
                <div class="contact-info-item--wrapper">
                    <p class="contact-info-item--title font-bold">Email</p>
                    <a href="mailto:<?php echo empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']; ?>" class="contact-info-item--meta font-light"><?php echo empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']; ?></a>
                </div>
            </li>
        </ul>
        <div class="contact-form-wrapper">
            <?php echo do_shortcode('[contact-form-7 id="11" title="Contact form 1"]'); ?>
        </div>
    </div>
    <div class="contact-map">
        <?php echo do_shortcode('[dpi_maps]'); ?>
    </div>
  </article>
</section>
