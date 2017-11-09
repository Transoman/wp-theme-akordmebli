<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package akordmebli
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-list__item'); ?>>
	<div class="search-list__content">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e( 'Read more', 'akordmebli' ); ?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
