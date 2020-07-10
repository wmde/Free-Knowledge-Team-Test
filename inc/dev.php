<?php
/**
 * Show current template name
 */
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

/************************************
 * Live Reload for during development
 ************************************/

// If your site is running locally it will load the livereload js file into the footer.
// This makes it possible for the browser to reload after a change has been made.

if ( in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) ) {

    function wtt_livereload_script() {

    	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
    	wp_enqueue_script('livereload');

    }

    add_action( 'wp_enqueue_scripts', 'wtt_livereload_script' );

}
