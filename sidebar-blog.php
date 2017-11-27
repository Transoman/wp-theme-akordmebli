<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akordmebli
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>

<aside id="sidebar" class="widget-area sidebar">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside><!-- #secondary -->
