<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package akordmebli
 */

get_header(); ?>

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<!-- begin breadcrumbs -->
				<section class="breadcrumbs">
					<h1 class="section-header"><?php single_post_title(); ?></h1>

					<?php woocommerce_breadcrumb( array(
						'delimiter' => '',
						'wrap_before' => '<ul class="breadcrumbs-list">',
						'wrap_after' => '</ul>',
						'before' => '<li class="breadcrumbs-list__item">',
						'after' => '</li>'
					) ); ?>

				</section>
				<!-- end breadcrumbs -->
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

						the_post_navigation( array(
							'prev_text' => __('<svg class="article-nav__icon article-nav__icon--prev"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left-arrow"></use></svg> Prev post', 'akordmebli'),
							'next_text' => __('Next post <svg class="article-nav__icon article-nav__icon--next"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>', 'akordmebli'),
						) );

						do_action( 'akordmebli_page_after' );

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- end col-md-9 -->

			<div class="col-md-3 col-md-offset-1">
				<?php get_sidebar('blog'); ?>
			</div>

		</div><!-- end row -->
	</div><!-- end container -->

<?php
get_footer();
