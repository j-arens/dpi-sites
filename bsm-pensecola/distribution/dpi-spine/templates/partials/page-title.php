<div class="page-title mw-container">
    <?php if ( is_search() ): ?>
        <h1 class="page-title__content"><?= 'Search: ' . get_search_query(); ?></h1>
    <?php elseif ( is_404() ): ?>
        <h1 class="page-title__content">Not Found</h1>
    <?php elseif ( is_archive() ): ?>
        <h1 class="page-title__content"><?= ucfirst(get_post_type()); ?> Archive</h1>
    <?php else: ?>
        <h1 class="page-title__content"><?= get_the_title(); ?></h1>
    <?php endif ?>
    <hr class="page-title__rule">
</div>
