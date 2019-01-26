<header class="site-header container">
  <?php get_template_part( 'partials/site-nav' ); ?>

  <?php if ( is_home() ): ?>
  <div class="row hero-row">
    <div class="hero col-xs-12">
      <div class="hero-img-container">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-text-01.svg' ?>" alt="St. Mark Parish" />
      </div>
      <button id="explore-button" class="scroll-down hvr-pulse-rotated" data-scrollto=".home-featured"></button>
    </div>
  </div>
  <?php endif; ?>

</header>
