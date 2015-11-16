<?php
/**
 * Superiocity RCHN functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Superiocity_RCHN
 */

if ( ! function_exists( 'superiocity_rchn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function superiocity_rchn_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'superiocity_rchn' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif; // superiocity_rchn_setup
add_action( 'after_setup_theme', 'superiocity_rchn_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function superiocity_rchn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'superiocity_rchn' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'superiocity_rchn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function superiocity_rchn_scripts() {
	$faVer      = '4.4.0';
	$faURL      = "//maxcdn.bootstrapcdn.com/font-awesome/{$faVer}/css/font-awesome.min.css";
	$gfURL      = '//fonts.googleapis.com/css?family=Play:400,700';
	$mainJsFile = '/js/main.min.js';
	$mainJsPath = get_stylesheet_directory() . $mainJsFile;
	$mainJsURL  = get_stylesheet_directory_uri() . $mainJsFile;
	$mainJsVer  = filemtime( $mainJsPath );

	wp_enqueue_style( 'superiocity_rchn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', $faURL, null );
	wp_enqueue_style( 'google-font', $gfURL, null );
	wp_enqueue_script( 'main-script', $mainJsURL, null, $mainJsVer, true );
}

add_action( 'wp_enqueue_scripts', 'superiocity_rchn_scripts' );

