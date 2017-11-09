<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package akordmebli
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- begin breadcrumbs -->
	<section class="breadcrumbs">
		<?php the_title( '<h1 class="section-header">', '</h1>' ); ?>

		<?php woocommerce_breadcrumb( array(
			'delimiter' => '',
			'wrap_before' => '<ul class="breadcrumbs-list">',
			'wrap_after' => '</ul>',
			'before' => '<li class="breadcrumbs-list__item">',
			'after' => '</li>'
		) ); ?>
	</section>
	<!-- end breadcrumbs -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'akordmebli' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'akordmebli' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div><!-- #post-<?php the_ID(); ?> -->
