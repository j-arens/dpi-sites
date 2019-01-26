<header class="site-header">
  <?php if (is_front_page()): ?>
      <?= get_template_part('partials/header-home') ?>
  <?php else: ?>
      <?= get_template_part('partials/header-inner') ?>
  <?php endif; ?>
</header>
