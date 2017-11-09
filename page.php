<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package akordmebli
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							/**
							 * Functions hooked in to akordmebli_page_after action
							 *
							 * @hooked akordmebli_display_comment - 10
							 */
							do_action( 'akordmebli_page_after');

						endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- end col-md-12 -->
		</div><!-- end row -->
	</div><!-- end container -->

<?php
// get_sidebar();
get_footer();
