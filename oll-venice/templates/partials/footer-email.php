<?php

    $emailAddress = carbon_get_theme_option('church_email') ?: 'Office@ollvenice.org';

?>


<div class="site-footer__widget site-footer__col">
    <?php get_template_part('svg/email') ?>
    <p class="site-footer__widget-title">
        Email:
    </p>
    <a href="mailto:<?= $emailAddress ?>" class="site-footer__contact-link"><?= $emailAddress ?></a>
</div>