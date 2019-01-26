<?php

    $News = new Spine\scripts\php\News();
    $newsPosts = $News->getPosts(3);

?>

<section class="news">
    <div class="news__container mw-container">
        <h1 class="news__title">Parish News</h1>
        <ul class="news__list">
            <?php if(!empty($newsPosts)): ?>
                <?php foreach($newsPosts as $post) { ?>
                    <li class="news__item">
                        <a href="<?= $post['link'] ?>" class="news__overlay-link">
                            <figure class="news__window">
                                <div class="news__thumbnail" style="background-image: url(<?= $post['thumbnailUrl'] ?>)"></div>
                                <?php if($post['hoverFX']): ?>
                                    <div class="news__hover-fx">
                                        <?= get_template_part('svg/file-text') ?>
                                    </div>
                                <?php endif; ?>
                            </figure>
                            <p class="news__title"><?= $post['title'] ?></p>
                            <?php if (!empty($post['date'])): ?>
                                <time class="news__date" datetime="<?= $post['date'] ?>"><?= $post['date'] ?></time>
                            <?php endif; ?>
                            <p class="news__excerpt"><?= $post['content'] ?></p>
                            <p class="news__read-more">Read More ></p>
                        </a>
                    </li>
                <?php } ?>
            <?php else: ?>
                <p class="news__empty">Sorry, there aren't any events right now. Please check back soon.</p>
            <?php endif; ?>
        </ul>
    </div>
</section>