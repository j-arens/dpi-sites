<?php

    $footerComps = [
        'contact',
        'connect',
        'links',
        'gallery'
    ];

?>

<footer class="site-footer">
    <div class="site-footer__container mw-container">

        <?php foreach($footerComps as $comp) { ?>
            <?= get_template_part('partials/footer', $comp) ?>
        <?php } ?>

    </div>
    <div class="site-info">
        <p class="site-info__copyright">
            &copy; <?= date('Y') ?> St. Ann Catholic Church | Cincinnati, OH
        </p>
        <p class="site-info__diocesan">
            Made with &hearts; by <a href="//diocesan.com" class="site-info__link" target="_blank" rel="noopener">Diocesan</a>
        </p>
    </div>
</footer>
