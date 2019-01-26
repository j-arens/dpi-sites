<?php
    
    $links = carbon_get_post_meta(get_the_ID(), 'links', 'complex');

?>


<section class="home-links">
    <div class="mw-container">
        <ul class="home-links__list">
            <?php foreach($links as $link) { ?>
                <li class="home-links__box">
                    <a class="home-links__link" href="<?= get_page_link($link['page_to_link_to'][0]) ?>">
                        <figure class="home-links__thumbnail">
                            <img src="<?= wp_get_attachment_image_src($link['thumbnail'], 'full')[0] ?>" class="home-links__image">
                        </figure>
                        <h2 class="home-links__title">
                            <?= get_template_part('svg/' . $link['icon']) ?>
                            <?= wp_trim_words($link['title'], 4, '...') ?>
                        </h2>
                        <p class="home-links__excerpt"><?= wp_trim_words($link['excerpt'], 20, '...') ?></p>
                        <p class="home-links__follow-text"><?= wp_trim_words($link['link_text'], 3, '...') ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>