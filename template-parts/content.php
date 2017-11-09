<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package akordmebli
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article__item'); ?>>
	<div class="article__col-left">
		<div class="article__date-wrapp">
			<?php akordmebli_posted_on(); ?>
		</div>

		<ul class="share-list">
			<li class="share-list__item">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share-list__link">
					<i class="icon-facebook"></i>
				</a>
			</li>
			<li class="share-list__item">
				<a href="<?php the_permalink(); ?>" target="_blank" class="share-list__link">
					<i class="icon-vk"></i>
				</a>
			</li>
			<li class="share-list__item">
				<a href="<?php the_permalink(); ?>" target="_blank" class="share-list__link">
					<i class="icon-instagram"></i>
				</a>
			</li>
			<li class="share-list__item">
				<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="share-list__link">
					<i class="icon-twitter"></i>
				</a>
			</li>
			<li class="share-list__item">
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="share-list__link">
					<i class="icon-google-plus"></i>
				</a>
			</li>
		</ul>
	</div><!-- end article__col-left -->

	<div class="article__col-right">
		<div class="article__img-wrapp">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium', ''); //get_the_post_thumbnail( null, 'post-thumbnail', '' ); ?>
			</a>
		</div>

		<div class="article__content">
			<header class="entry-header">

			<?php
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php akordmebli_posted_by(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_excerpt();
					// the_content( sprintf(
					// 	wp_kses(
					// 		/* translators: %s: Name of current post. Only visible to screen readers */
					// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'akordmebli' ),
					// 		array(
					// 			'span' => array(
					// 				'class' => array(),
					// 			),
					// 		)
					// 	),
					// 	get_the_title()
					// ) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'akordmebli' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

		</div>

	</div><!-- end article__col-right -->

</article><!-- #post-<?php the_ID(); ?> -->
