<?php 

    $footerComponents = [
        'footer-mass-times',
        'footer-bulletin',
        'footer-links',
        'footer-contact'
    ];

?>

<footer class="site-footer">
  <div class="site-footer__container mw-container">
    <?php foreach($footerComponents as $comp) { ?>
        <div class="site-footer__widget">
            <?= get_template_part('partials/' . $comp) ?>
        </div>
    <?php } ?>
  </div>
  <div class="site-info">
    <div class="site-info__container mw-container">
        <p class="site-info__copyright">
            &copy; <?= date('Y') ?> St. John the Evangelist Catholic Church | Jackson, MI
        </p>
        <p class="site-info__diocesan">
            Made with &hearts; by <a class="site-info__link" href="//diocesan.com">Diocesan Publications</a>
        </p>
    </div>
  </div>
</footer>
