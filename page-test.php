<?php
/*
 Template Name: Test Page
 *
*/

get_header();
	while ( have_posts() ) : the_post();

	$test = get_field('shortcode', false, false);
	$section_1_title = get_field('section_1_title', false, false);
	$section_1_subtitle = get_field('section_1_subtitle', false, false);
	$section_1_button = get_field('section_1_button', false, false);
	$section_2_title = get_field('section_2_title', false, false);
	$section_2_button = get_field('section_2_button', false, false);
	$section_3_title = get_field('section_3_title', false, false);
	$section_3_button = get_field('section_3_button', false, false);
	$section_4_title = get_field('section_4_title', false, false);
	$section_4_button = get_field('section_4_button', false, false);
	$section_4_text = get_field('section_4_text', false, false);
	$section_5_title = get_field('section_5_title', false, false);
	$restart = get_field( 'labels_neustart', 'option' );
	$overview = get_field( 'labels_uebersicht', 'option' ); ?>

	<div class="app">
	 <a class="app__back-link" href="<?php echo home_url(); ?>" aria-label="<?php echo $overview; ?>" title="<?php echo $overview; ?>">×</a>
	 <a class="app__restart-link" href="<?php echo home_url('/'); ?>test" aria-label="<?php echo $restart; ?>" title="<?php echo $restart; ?>"><?php echo $restart; ?></a>
	 <div class="screen screen--start">
		 <div class="screen__inner">
			 <div class="screen__inner__content">
				 <h2 class="screen__title"><?php echo $section_1_title; ?></h2>
				 <h2 class="screen__subtitle"><?php echo $section_1_subtitle; ?></h2>
				 <a class="button"><?php echo $section_1_button; ?></a>
			 </div>
		 </div>
	 </div>
	 <div class="intro-1 screen screen--intro">
		 <div class="screen__inner">
			 <h2 class="screen__title"><?php echo $section_2_title; ?></h2>
			 <a class="screen__next"><?php echo $section_2_button; ?> &#187;</a>
		 </div>
	 </div>
	 <div class="intro-2 screen screen--intro">
		 <div class="screen__inner">
			 <h2 class="screen__title"><?php echo $section_3_title; ?></h2>
			 <a class="screen__next"><?php echo $section_3_button; ?> &#187;</a>
		 </div>
	 </div>
	 <div class="intro-3 screen screen--intro">
		 <div class="screen__inner">
			 <h2 class="screen__title"><?php echo $section_4_title; ?></h2>
			 <a class="button"><?php echo $section_3_button; ?></a>
			 <p><?php echo $section_4_text; ?></p>
		 </div>
	 </div>
	 <?php echo apply_filters('acf_the_content', $test); ?>
	 <div class="screen screen--end">
		 <h2 class="screen__title"><?php echo $section_5_title; ?></h2>
	 </div>
	</div>

	<?php
	endwhile; // End of the loop.
// get_sidebar(); ??
get_footer();
