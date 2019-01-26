<?php
/**
 * Template Name: No Sidebar
 */
 ?>

<?= get_template_part('partials/page-header') ?>
<div class="content">
    <?php if (Spine\scripts\php\displaySidebar()): ?>
        <aside class="sidebar">
            <?php get_template_part('partials/sidebar'); ?>
        </aside>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
        <?= get_template_part('partials/content-page') ?>
    <?php endwhile; ?>
</div>