<?php

    $links = carbon_get_theme_option('quick_links', true);

?>

<?php if(!empty($links)): ?>
    <section class="quick-links">
        <div class="quick-links__container mw-container">
            <ul class="quick-links__list">
                <li class="quick-links__item">
                    <p class="quick-links__title">
                        <?= get_template_part('svg/link') ?>
                        quick links:
                    </p>
                </li>
                <?php foreach($links as $link) { ?>
                    <li class="quick-links__item">
                        <a href="<?= $link['link_url'] ?>" target="_blank" rel="noopener" class="quick-links__link">
                            <?= $link['link_title'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php endif; ?>