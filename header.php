<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akordmebli
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</head>

<body <?php body_class(); ?>>
	<div id="loader-wrapp">
		<div class="loader"></div>
	</div>
	<!-- begin wrapper -->
	<div class="wrapper">

		<header class="header">
			<!-- begin container -->
			<div class="container">
				<!-- begin header-wrapp -->
				<div class="header-wrapp">

					<button class="nav-toggle">
						<span class="nav-toggle__line"></span>
					</button>

					<div class="logo-wrapp">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">AkordMebli</a>
					</div>

					<?php if ( has_nav_menu( 'primary' ) ): ?>
						<nav class="nav">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class' => 'nav__list',
									'walker' => new top_menu(),
									'container' => false
								) );
							?>
						</nav>
					<?php endif; ?>

					<!-- begin search -->
					<div class="header-search">
						<a href="#" class="header-search__btn">
							<svg class="header-search__icon"><use xlink:href="#icon-search"></use></svg>
						</a>
					</div><!-- end search -->

				</div><!-- end header-wrapp -->

			</div><!-- end container -->
		</header>

		<div id="content" class="site-content">