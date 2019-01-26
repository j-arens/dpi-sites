<?php

    $quickLinks = carbon_get_theme_option('homepage_quick_links', true);

?>

<?php if (!empty($quickLinks)): ?>
<section class="quick-links">
    <div class="quick-links__container mw-container mw-container--fw">
        <ul class="quick-links__list">
            <li class="quick-links__item">
                <p class="quick-links__title">
                    <?= get_template_part('svg/circle-link') ?>
                    Links:
                </p>
            </li>
            <?php foreach($quickLinks as $link): ?>
                <li class="quick-links__item">
                    <a 
                        href="<?= esc_url($link['link_url']) ?>" 
                        class="quick-links__link"
                        <?= $link['new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                    >
                        <?= $link['link_title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>