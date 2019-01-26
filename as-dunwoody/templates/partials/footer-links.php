<?php

    $links = carbon_get_theme_option('footer_links', true);
    $linkList = empty($links) ? [] : array_chunk($links, round(count($links) / 2), true);

?>

<div class="site-footer__widget site-footer__links footer-links">
    <span class="site-footer__widget-title font-regular">Links</span>
    <hr class="site-footer__widget-divider">
    <div class="footer__links-flex-container">
        <?php foreach($linkList as $list): ?>
            <ul class="footer__links-list">
                <?php foreach($list as $link): ?>
                    <li class="footer__links-item">
                        <a 
                            href="<?= esc_url($link['link_url']) ?>" 
                            <?= $link['open_in_new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                            class="footer__links-link">
                                <?= $link['link_title'] ?>
                            </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </div>
</div>