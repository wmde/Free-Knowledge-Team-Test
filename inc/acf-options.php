<?php

// ACF OPTIONS PAGE

if( function_exists('acf_add_options_page') ) {

    // Parent Page 'Settings'
    acf_add_options_page(array(
      'page_title'  => 'Addtional Settings',
      'menu_title'  => 'Addtional Settings',
      'menu_slug'   => 'additional-settings',
      'capability'  => 'edit_posts'
    ));

    // Sub Page

    acf_add_options_sub_page(array(
      'page_title'  => 'i8nl',
      'menu_title'  => 'i8nl',
      'capability'  => 'edit_posts',
      'parent_slug'   => 'additional-settings'
    ));



}
