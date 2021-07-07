<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UnderGongs
 */



$uclass = "post-" . get_the_ID() . " " . esc_attr( implode( ' ', get_post_class() ) );
?>

	<?php if (is_post_type_archive('record')) : ?>

		<div class="entry-meta">

			<?php undergongs_post_thumbnail(); ?>

			<?php the_field('record_details'); ?>

		</div>

	<?php endif; ?>


	<div class="entry-content">

		<?php if ( is_archive() ) : ?>

		<header class="entry-header <?php echo $uclass; ?>">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

		<?php	endif; ?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'undergongs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'undergongs' ),
				'after'  => '</div>',
			)
		);
		?>

		<footer class="entry-footer">
			<?php undergongs_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .entry-content -->
