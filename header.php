<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superiocity_RCHN
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class( is_front_page() ? 'home' : 'inner' ); ?>>
<div id="page" class="hfeed">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link"><img class="logo" width="75" height="75" src="<?= esc_url( get_stylesheet_directory_uri() )?>/images/rc-heli-nation-logo.svg" alt="<?php bloginfo( 'name' ); ?>"></a>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<div class="menu-wrapper">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<a href="javascript:void(0);" id="search-icon-link"><i class="fa fa-search"></i></a>
					<?php get_search_form( true ) ?>
				</div>
			</nav><!-- #site-navigation -->
		</div><!-- .site-branding -->
		<?php if ( is_front_page() ): ?>
		<div class="hero">
			<div class="tagline-buttons">
				<h3><?php bloginfo( 'description' ) ?></h3>
				<a href="https://itunes.apple.com/podcast/rc-heli-nation-v-2.0/id367091559?mt=2" class="button light">Subscribe on iTunes</a>
				<a href="http://subscribeonandroid.com/www.rchelination.com/feed/podcast/" class="button light">Subscribe on Android</a>
			</div>
			<div class="vignette">
				<?php if ( ! wp_is_mobile() ): ?>
					<style>
						.home #masthead { background: none; }
					</style>
				<video loop autoplay src="<?= get_template_directory_uri() ?>/video/rchn-cover.mp4" poster="<?= get_stylesheet_directory_uri() ?>/images/rchn-cover-poster.jpg">
					<source src="<?= get_template_directory_uri() ?>/video/rchn-cover.mp4">
				</video>
				<?php else: ?>
					<style>
						.home #masthead { background: url(<?= get_template_directory_uri() ?>/images/backs-on-air.jpg) no-repeat 60% center ; background-size: cover;}
					</style>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

