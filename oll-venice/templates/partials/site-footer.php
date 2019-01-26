<?php 

    $footerComps = [
        'footer-links',
        'footer-donate',
        'footer-email',
        'footer-phone',
        'footer-contact'
    ];

?>

<footer class="site-footer">
  <div class="container">
    <div class="row mw-container">
        <?php foreach($footerComps as $comp): ?>
            <?= get_template_part('partials/' . $comp) ?>
        <?php endforeach; ?>
    </div>
    <div class="site-info">
      <p class="site-info__copyright">
        &copy; <?=Date('Y')?> <?= carbon_get_theme_option('church_name') ?> | <?= carbon_get_theme_option('city') ?>, <?= carbon_get_theme_option('state') ?>
      </p>
      <p class="site-info__diocesan">
        Made with &hearts; by <a class="site-info__diocesan-link" href="//diocesan.com" target="_blank">Diocesan</a>
      </p>
    </div>
  </div>
</footer>