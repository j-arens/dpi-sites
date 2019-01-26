<?php

    function getFeaturedLinks() {
        $links = [];

        for($i = 1; $i < 6; $i++) {
            $links[] = [
                'image' => wp_get_attachment_image_src(carbon_get_the_post_meta('featured_link_'.$i.'_img'), 'medium')[0] ?: get_template_directory_uri() . '/assets/images/featured-placeholder-01.jpg',
                'title' => carbon_get_the_post_meta('featured_link_'.$i.'_title') ?: 'Coming Soon',
                'linkUrl' => carbon_get_the_post_meta('featured_link_'.$i.'_addr') ?: '#',
                'newTab' => carbon_get_the_post_meta('featured_link_'.$i.'_tab')
            ];
        }

        return $links;
    }

    $featuredLinks = getFeaturedLinks();

?>

<section class="home-featured-links">
    <div class="home-featured-links__container mw-container">
        <ul class="home-featured-links__list">
            <?php if(!empty($featuredLinks)): ?>
                <?php foreach($featuredLinks as $link) { ?>
                    <li class="home-featured-links__item">
                        <a href="<?= $link['linkUrl'] ?>" class="home-featured-links__link" <?= $link['newTab'] === 'yes' ? 'target="blank" rel="noopener"' : '' ?>>
                            <span class="home-featured-links__thumbnail" style="background-image: url(<?= $link['image'] ?>)"></span>
                            <span class="home-featured-links__link-title"><?= $link['title'] ?></span>
                        </a>
                    </li>
                <?php } ?>
            <?php endif; ?>
        </ul>
    </div>
</section>