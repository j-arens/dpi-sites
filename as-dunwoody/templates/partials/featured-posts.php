<?php 

    $controller = new Spine\scripts\php\FeaturedPosts();
    $categories = carbon_get_the_post_meta('home_news_categories') ?: [];

?>

<section class="featured-posts">
    <div class="mw-container-lg featured-posts__container">
        <div class="featured-posts__header">
            <span class="featured-posts__heading font-bold">All Saints News and Events</span>
            <ul class="featured-posts__categories">
                <?php foreach($categories as $categoryID): ?>
                    <?php if (get_category($categoryID)->category_count > 0): ?>
                        <li class="featured-posts__category-item">
                            <a href="<?= esc_url(trailingslashit(get_post_type_archive_link('post')) . '?cat=' . $categoryID) ?>" class="featured-posts__category-link">
                                <?= get_cat_name($categoryID) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="featured-posts__category-item">
                    <a href="<?= esc_url(get_post_type_archive_link('post')) ?>" class="featured-posts__category-link">View All</a>
                </li>
            </ul>
        </div>
        <hr class="featured-posts__divider">
        <ul class="featured-posts__list">
            <?php foreach($controller->getFeaturedPosts() as $post): ?>
                <li class="featured-posts__item">
                    <a href="<?= $post['link'] ?>" class="featured-posts__overlay-link">
                        <figure class="featured-posts__window">
                            <div 
                                class="featured-posts__thumbnail" 
                                style="background-image: url(<?= $post['thumbnail'] ?>); <?= $post['trim'] ? 'background-size: contain;' : '' ?>">
                            </div>
                        </figure>
                        <p class="featured-posts__post-title font-medium"><?= $post['title'] ?></p>
                        <span class="featured-posts__post-date"><?= date('l, F jS', $post['date']) ?></span>
                        <p class="featured-posts__post-excerpt"><?= $post['excerpt'] ?></p>
                        <span class="featured-posts__continued font-medium">Read More...</span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= esc_url(get_post_type_archive_link('post')) ?>" class="featured-posts__view-all btn btn--center">View All</a>
    </div>
</section>