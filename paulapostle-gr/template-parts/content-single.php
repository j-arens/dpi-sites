<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php

	if ( has_post_thumbnail() ) {
		echo get_the_post_thumbnail( get_the_id(), 'medium' );
	}

 	?>

	<div class="entry-content">
		<?php

			if (get_post_type() === 'events_posts') {

				$date = strtotime( get_post_meta( get_the_id(), 'event_info_event-date', true ) );
				$time = get_post_meta( get_the_id(), 'event_info_event-time', true );

				$html = '
					<p><strong>' . date( 'M d Y', $date ) . '</strong></p>
					<p><strong>' . $time . '</strong></p>
				';

				echo $html;
			}

			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
