<?php

/**
 * Enqueue scripts and styles.
 */
function _wikiapp_scripts() {
	wp_enqueue_style( '_wikiapp-style', get_stylesheet_uri(), array(), "0.6" );

	wp_enqueue_script( '_wikiapp-gform-helper', get_template_directory_uri() . '/js/gform-helper.js', array(), '0.6', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_wikiapp_scripts' );

/*********************
Stop Loading wp-embed
*********************/
function _wikiapp_stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', '_wikiapp_stop_loading_wp_embed_and_jquery');

/*********************
// Remove wp-embed.min.js from the front end.
// See here: https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4
*********************/

add_action( 'init', function() {
      // Remove the REST API endpoint.
      remove_action('rest_api_init', 'wp_oembed_register_route');
      // Turn off oEmbed auto discovery.
      // Don't filter oEmbed results.
      remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
      // Remove oEmbed discovery links.
      remove_action('wp_head', 'wp_oembed_add_discovery_links');
      // Remove oEmbed-specific JavaScript from the front-end and back-end.
      remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );



/*********************
GUTENBERG ENQUEUES
These are kept out of the main enqueue function in case you don't need them.
*********************/

// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', '_wikiapp_remove_block_css', 100 );
function _wikiapp_remove_block_css() {
    if (!is_single('post')) {
        wp_dequeue_style( 'wp-block-library' ); // Wordpress core
        wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
    }
}

////////////////////// DISABLE GUTENBERG /////////////////////

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);
