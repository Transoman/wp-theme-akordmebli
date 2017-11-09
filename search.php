<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package akordmebli
 */

get_header(); ?>

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<!-- begin breadcrumbs -->
				<section class="breadcrumbs">
					<h1 class="section-header"><?php printf( esc_html__( 'Search Results for: %s', 'akordmebli' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

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
			<div class="col-md-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>

						<div class="search-list">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile; ?>
						</div>

						<?php the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- end col-md-12 -->

		</div><!-- end row -->
	</div><!-- end container -->

<?php
get_footer();
