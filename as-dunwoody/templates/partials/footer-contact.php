<div class="site-footer__widget site-footer__contact footer-contact">
    <span class="site-footer__widget-title font-regular">Contact Information</span>
    <hr class="site-footer__widget-divider">
    <ul class="footer__contact-list">
        <li class="footer__contact-item">
            <strong>Office Hours:</strong> <?= carbon_get_theme_option('office_hours') ?>
        </li>
        <li class="footer__contact-item">
            <strong>Address:</strong>
            <?= 
                carbon_get_theme_option('street') . ', ' . carbon_get_theme_option('city') . ' ' . carbon_get_theme_option('state') . ' ' . carbon_get_theme_option('zip_code')
            ?>
        </li>
        <li class="footer__contact-item">
            <strong>Phone:</strong> <?= carbon_get_theme_option('phone_number') ?>
        </li>
        <li class="footer__contact-item">
            <strong>Fax:</strong> <?= carbon_get_theme_option('fax_number') ?>
        </li>
    </ul>
</div>