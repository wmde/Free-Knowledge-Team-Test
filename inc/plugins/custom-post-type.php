<?php
/**
* Plugin Name: Characters CPT
* Description: CPT Characters
* Version: 1.0
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'wm_flush_rewrite_rules' );

// Flush your rewrite rules
function wm_flush_rewrite_rules() {
	flush_rewrite_rules();
}


// Register Custom Post Type
function wm_characters_cpt() {

	$labels = array(
		'name'                  => _x( 'Characters', 'Post Type General Name', 'platetheme' ),
		'singular_name'         => _x( 'Character', 'Post Type Singular Name', 'platetheme' ),
		'menu_name'             => __( 'Characters', 'platetheme' ),
		'name_admin_bar'        => __( 'Character', 'platetheme' ),
		'archives'              => __( 'Character Archives', 'platetheme' ),
		'parent_item_colon'     => __( 'Parent Character:', 'platetheme' ),
		'all_items'             => __( 'All Characters', 'platetheme' ),
		'add_new_item'          => __( 'Add New Character', 'platetheme' ),
		'add_new'               => __( 'Add New Character', 'platetheme' ),
		'new_item'              => __( 'New Character', 'platetheme' ),
		'edit_item'             => __( 'Edit Character', 'platetheme' ),
		'update_item'           => __( 'Update Character', 'platetheme' ),
		'view_item'             => __( 'View Character', 'platetheme' ),
		'search_items'          => __( 'Search Characters', 'platetheme' ),
		'not_found'             => __( 'Not found', 'platetheme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'platetheme' ),
		'featured_image'        => __( 'Featured Image', 'platetheme' ),
		'set_featured_image'    => __( 'Set featured image', 'platetheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'platetheme' ),
		'use_featured_image'    => __( 'Use as featured image', 'platetheme' ),
		'insert_into_item'      => __( 'Insert into character', 'platetheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this character', 'platetheme' ),
		'items_list'            => __( 'Character list', 'platetheme' ),
		'items_list_navigation' => __( 'Character list navigation', 'platetheme' ),
		'filter_items_list'     => __( 'Filter character list', 'platetheme' ),
	);
	$rewrite = array(
		'slug'                  => 'gang',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Characters', 'platetheme' ),
		'description'           => __( 'Plate Characters', 'platetheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'thumbnail' ),
		'taxonomies'            => array( 'grouping' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		// You can change the base request here
		//'rest_base'             => 'characters',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	);
	register_post_type( 'wm_characters', $args );

}
add_action( 'init', 'wm_characters_cpt', 0 );


?>
