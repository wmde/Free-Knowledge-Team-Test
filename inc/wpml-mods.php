<?php

////////////////////// WPML /////////////////////

add_filter( 'wpml_custom_field_original_data', '__return_null' );

function mysite_languages() {
  if ( function_exists( 'icl_get_languages' ) ) :
    $languages = icl_get_languages( 'skip_missing=0&orderby=id&order=asc' );
    if ( ! empty( $languages ) ) :
      echo "\n<ul class=\"language-widget\">\n";
      foreach ( $languages as $lang ) :
        echo '<li class="language-chooser-item ' . ( $lang['active'] ? 'active' : ''  ) . '"><a href=' . $lang['url'] . '>' . $lang['language_code'] . "</a></li>\n";
      endforeach;
      echo "</ul>\n";
    endif; // ( ! empty( $languages ) )
  endif; // ( function exists )
}
