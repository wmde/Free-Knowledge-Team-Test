<?php
/**
 * _wikiapp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _wikiapp
 */

if ( ! function_exists( '_wikiapp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _wikiapp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _wikiapp, use a find and replace
		 * to change '_wikiapp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_wikiapp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );

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
			'menu-1' => esc_html__( 'Primary', '_wikiapp' ),
		) );


		// WP version
    remove_action( 'wp_head', 'wp_generator' );

		// remove WP version from RSS
		// add_filter( 'the_generator', 'wtt_rss_version' );

		// remove WP version from css
    // add_filter( 'style_loader_src', 'wtt_remove_wp_ver_css_js', 9999 );

    // remove WP version from scripts
    // add_filter( 'script_loader_src', 'wtt_remove_wp_ver_css_js', 9999 );


	}
endif;

add_action( 'after_setup_theme', '_wikiapp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _wikiapp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_wikiapp_content_width', 640 );
}
add_action( 'after_setup_theme', '_wikiapp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _wikiapp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_wikiapp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_wikiapp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_wikiapp_widgets_init' );
