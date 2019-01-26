<div class="site-footer__widget site-footer__col">
    <?php get_template_part('svg/heart') ?>
    <a 
        href="<?= esc_url(carbon_get_theme_option('giving_url')) ?>" 
        class="site-footer__donate-link btn btn-gscale"
        <?= carbon_get_theme_option('giving_new_tab') === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
        >
            Donate
    </a>
</div>