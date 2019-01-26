<?php if ( is_search() ): ?>
  <h1 class="header-page-title"><?php echo 'Search: ' . get_search_query(); ?></h1>
<?php else: ?>
  <h1 class="header-page-title"><?php echo get_the_title(); ?></h1>
<?php endif ?>
