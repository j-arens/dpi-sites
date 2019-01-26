<?php

    $headingTitle = 'News & Events';
    $headingLink = '/news';
    $headingLinkText = 'View More >';

    $HomeNews = new Spine\scripts\php\HomeNews();
    $posts = $HomeNews->getPosts(3);

?>

<section class="home-news">
    <div class="home-news__container mw-container">
        <?php include locate_template('partials/home-heading.php') ?>
        <ul class="home-news__list">
            <?php foreach($posts as $post) { ?>
                <li class="home-news__item">
                    <a href="<?= $post['link'] ?>" class="home-news__cover-link">
                        <figure class="home-news__window">
                            <span class="home-news__thumbnail <?= basename($post['thumbnailUrl']) === 'bsm-logo-white-01.png' ? 'home-news--placeholder' : '' ?>" style="background-image: url(<?= $post['thumbnailUrl'] ?>)"></span>
                            <?php if ($post['hoverFX']): ?>
                                <span class="home-news__window-hover">
                                    <?= get_template_part('svg/newspaper') ?>
                                </span>
                            <?php endif; ?>
                        </figure>
                        <p class="home-news__title"><?= $post['title'] ?></p>
                        <p class="home-news__excerpt"><?= $post['content'] ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>