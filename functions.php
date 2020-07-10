<?php

require get_template_directory() . '/inc/theme-setup.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/gform-quiz.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/plugins/custom-post-type.php';

require get_template_directory() . '/inc/acf-options.php';

/**
 * Load scripts
 */
require get_template_directory() . '/inc/load-scripts.php';

require get_template_directory() . '/inc/wpml-mods.php';

// require get_template_directory() . '/inc/dev.php';

require get_template_directory() . '/inc/disable-comments.php';

require get_template_directory() . '/inc/disable-emojis.php';
