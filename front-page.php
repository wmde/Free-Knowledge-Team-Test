<?php
get_header();
	while ( have_posts() ) : the_post(); ?>
		<header class="home-header">
			<div class="home-header__wrapper">
				<p class="home-header__intro"><?php the_field('hero_intro'); ?></p>
				<h1 class="home-header__heading"><?php the_field('hero_title'); ?></h1>
				<?php
				$link = get_field('hero_button');
				if( $link ):
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
						<a class="home-header__button button button--pink button--large" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>

			<div class="home-header__nav" href="https://wikimedia.de">
				<div class="home-header__languages" href="https://wikimedia.de">
					<?php mysite_languages(); ?>
				</div>
				<a class="home-header__logo-link" href="https://wikimedia.de">
					<img class="home-header__logo-img" src="<?php echo get_theme_file_uri(); ?>/images/wikim-logo.png" alt="Wikimedia Deutschland">
				</a>
			</div>
			<div class="home-header__stage">
				<img class="home-header__image" src="<?php echo get_theme_file_uri(); ?>/images/home/wikimedia-buehne.png" alt="Eule und Eichhörnchen mit Umfragebogenn">
			</div>
		</header>
		<div class="test">
			<div class="test__cta">
				<h2 class="test__cta__title"><?php the_field('test_cta_title'); ?></h2>
				<p class="test__cta__text"><?php the_field('test_cta_text'); ?></p>
			</div>
			<div class="test__result">
				<h2 class="test__result__title"><?php the_field('test_result_title'); ?></h2>
				<p class="test__result__text"><?php the_field('test_result_text'); ?></p>
				<img class="test__arrow" width="100" height="100" src="<?php echo get_theme_file_uri(); ?>/images/home/wikim-pfeil-nach-unten.svg" alt="">
			</div>
		</div>
		<div class="characters">
			<div class="characters__heading">
				<h2 class="characters__heading__title"><?php the_field('characters_title'); ?></h2>
				<p class="characters__heading__text"><?php the_field('characters_text'); ?></p>
			</div>
			<?php
			$args = array('post_type' => 'wm_characters', 'showposts' => 9);
			$char_query = new WP_Query( $args );
			$count=1;
			while ( $char_query->have_posts()) : $char_query->the_post(); ?>
				<?php $title = get_field('title'); ?>
				<div class="character">
					<a class="character__card" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
						<span class="character__heading"><?php echo $title; ?></span>
					</a>
				</div>
			<?php
			$count++;
			endwhile;
			wp_reset_postdata(); ?>
		</div>
		<div class="participate">
				<div class="participate__details">
					<h2 class="participate__heading"><?php the_field('participate_title'); ?></h2>
					<div class="participate__text">
						<p><?php the_field('participate_text'); ?></p>
						<?php
						$link = null;
						$link = get_field('participate_button');
						if( $link ):
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
								<a class="participate__button button button--pink" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>

					</div>
				</div>
				<div class="participate__screenshot">
					<a href="<?php echo home_url(); ?>/test">
						<?php if(ICL_LANGUAGE_CODE=='en'){
							$gameImg = get_theme_file_uri()."/images/home/wikim-grafik-gamescreen-en.png";
						}
						else{
							$gameImg = get_theme_file_uri()."/images/home/wikim-grafik-gamescreen.png";
						}?>
						<img class="participate__screenshot__image" src="<?php echo $gameImg; ?>" alt="Bildschirmfoto des Quiz 'Was ist deine Superpower?'">
					</a>
				</div>
		</div>
	<?php
	endwhile; // End of the loop.
get_footer();
