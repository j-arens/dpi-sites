<?php 

    $ctaItems = carbon_get_post_meta(get_the_ID(), 'giving_cta_items', 'complex');

?>

<section class="giving-template__section giving-ctas mw-container">
    <ul class="giving-ctas__list">
        <?php foreach($ctaItems as $cta) { ?>
            <li class="giving-ctas__item">
                <?= get_template_part('svg/' . $cta['icon']) ?>
                <p class="giving-ctas__content"><?= $cta['content'] ?></p>
                <a href="<?= esc_url($cta['button_link_url']) ?>" class="giving-ctas__link"><?= $cta['button_title'] ?></a>
            </li>
        <?php } ?>
    </ul>
</section>