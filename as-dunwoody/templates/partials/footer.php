<?php

    $footerComps = [
        'footer-social',
        'footer-links',
        'footer-contact'
    ];

?>

<footer class="site-footer">
    <div class="mw-container-lg site-footer__container">
        <?php 
            if (!empty($footerComps)) {
                foreach($footerComps as $comp) {
                    get_template_part('partials/' . $comp);
                }
            }
        ?>
    </div>
    <div class="site-info">
        <p class="site-info__church">
            &copy; <?= date('Y') ?> All Saints Catholic Church | Dunwoody, GA. All rights reserved
        </p>
        <p class="site-info__diocesan">
            Created with love by <a href="https://diocesan.com" target="_blank" rel="noopener">Diocesan</a>
        </p>
    </div>
</footer>
