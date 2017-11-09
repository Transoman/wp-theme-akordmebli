<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package akordmebli
 */

if ( ! function_exists( 'akordmebli_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function akordmebli_posted_on() {

		$posted = '<a href="" class="article__date-link">';
		$posted .= '<time datetime="' . esc_attr(get_the_date( 'c' )) .'">';
		$posted .= '<span class="article__date-day">' . esc_attr(get_the_date( 'd' )) .'</span>';
		$posted .= '<span class="article__date-month">' . esc_attr(get_the_date( 'M' )) .'</span>';
		$posted .= '</time>';
		$posted .= '</a>';

		echo $posted;
	}
endif;


function akordmebli_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'Posted by %s', 'post author', 'akordmebli' ),
		'<a class="article__author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<span class="posted-by">' . $byline . '</span>'; // WPCS: XSS OK.

	$categories_list = get_the_category_list( esc_html__( ', ', 'akordmebli' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'akordmebli' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
}

if ( ! function_exists( 'akordmebli_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function akordmebli_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'akordmebli' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'akordmebli' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'akordmebli' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'akordmebli' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'akordmebli' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

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
	}
endif;
