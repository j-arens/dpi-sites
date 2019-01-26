<?php 
/**
* Template Name: Pastor's Notes Archive
*/

    $no_posts = false;

    get_template_part('partials/page-header');

    ?>
        <section class="content-container content-container--blue">
    <?php

    foreach(get_terms('news_categories') as $term) {
        $query = new WP_Query([
            'post_type' => 'news',
            'news_categories' => $term->slug
        ]);

        if ($query->have_posts()) {
            ?>
                <?php while($query->have_posts()) : $query->the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="entry-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php
        } else {
            $no_posts = true;
        }
        wp_reset_postdata();
    }

    if ($no_posts) {
        ?>
            <div class="archive-no-posts">
                <h2>Sorry, there aren't any notes right now. Please check back soon!</h2>
            </div>
        <?php
    } else {
        ?>
            <nav class="pagination-nav">
                <div class="nav-previous alignleft"><?php next_posts_link( 'Older Posts' ); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link( 'Newer Posts' ); ?></div>
            </nav>
        <?php
    }

    ?>
</section>
