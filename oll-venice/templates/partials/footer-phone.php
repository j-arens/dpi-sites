<?php 

    $phone = carbon_get_theme_option('phone_number');

?>

<div class="site-footer__widget site-footer__col">
    <?php get_template_part('svg/phone'); ?>
    <p class="site-footer__widget-title">
        Phone:
    </p>
    <a href="tel:#<?= $phone ?>" class="site-footer__contact-link"><?= $phone ?></a>
</div>