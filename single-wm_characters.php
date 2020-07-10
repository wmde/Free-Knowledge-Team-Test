<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _wikiapp
 */

get_header();
		while ( have_posts() ) :
			the_post(); ?>
			<div class="character-page">
			  <?php $image = get_field('secondary_image'); ?>
			  <?php $title = get_field('title'); ?>
			  <?php $gang_text_title = get_field('gang_text_title'); ?>
			  <?php $gang_text_text = get_field('gang_text_text'); ?>
			  <?php $cta_title = get_field('cta_title'); ?>
			  <?php $cta_description = get_field('cta_description'); ?>

				<?php $fb = get_field( 'social_facebook', 'option' ); ?>
				<?php $tw = get_field( 'social_twitter', 'option' ); ?>
				<?php $wa = get_field( 'social_whatsapp', 'option' ); ?>
				<?php $tg = get_field( 'social_telegram', 'option' ); ?>
				<?php $overview = get_field( 'labels_uebersicht', 'option' ); ?>
				<?php $share = get_field( 'labels_teile_doch_mal', 'option' ); ?>

				<?php
				if(ICL_LANGUAGE_CODE=='en'){
					$fbUrl = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Fen%2Ftest%2F";
					$twUrl = "https://twitter.com/share?url=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Fen%2Ftest%2F";
					$waUrl = "https://api.whatsapp.com/send?text=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Fen%2Ftest%2F";
					$tgUrl = "https://telegram.me/share/url?url=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Fen%2Ftest%2F";
				}
				else{
					$fbUrl = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Ftest%2F";
					$twUrl = "https://twitter.com/share?url=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Ftest%2F";
					$waUrl = "https://api.whatsapp.com/send?text=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Ftest%2F";
					$tgUrl = "https://telegram.me/share/url?url=http%3A%2F%2Fwikimedia.de%2Fmitmachen%2Ftest%2F";
				}
				?>

			  <a class="character-page__back-link" href="<?php echo home_url(); ?>" aria-label="<?php echo $overview; ?>" title="<?php echo $overview; ?>">×</a>
			  <header class="character-page__header">
			    <img class="character-page__image" src="<?php echo $image['url']; ?>" alt="">
			    <h1 class="character-page__title"><?php echo $title; ?></h1>
			  </header>
			  <div class="character-page__info">
			    <div class="character-page__gang-text">
			      <h2 class="character-page__gang-text__heading"><?php echo $gang_text_title; ?></h2>
			      <p class="character-page__gang-text__text"><?php echo $gang_text_text; ?></p>
			    </div>
			    <div class="character-page__cta">
			      <h2 class="character-page__cta__heading"><?php echo $cta_title; ?></h2>
			      <p class="character-page__cta__description">
			        <?php echo $cta_description; ?>
			      </p>
			      <?php
			      if( have_rows('cta_content') ):
			          while ( have_rows('cta_content') ) : the_row();
			              if( get_row_layout() == 'heading' ): ?>
			      <h3 class="character-page__cta__subheading"><?php	the_sub_field('heading');  ?></h3>
			      <?php
			              elseif( get_row_layout() == 'button' ):
			                 $link = get_sub_field('button');
			                  if( $link ):
			                  	$link_url = $link['url'];
			                  	$link_title = $link['title'];
			                  	$link_target = $link['target'] ? $link['target'] : '_self'; ?>
			      <a class="character-page__cta__button button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
			      <?php
			                  endif;
			              endif;
			          endwhile;
			      endif; ?>
			    </div>
			    <div class="character-page__social">
			      <h3 class="character-page__social__heading"><?php echo $share; ?></h3>
			      <?php // echo do_shortcode("[shariff]"); ?>
			      <ul class="social__buttons">
			        <li class="social__button facebook">

			          <a href="<?php echo $fbUrl; ?>" title="<?php echo $fb; ?>" aria-label="<?php echo $fb; ?>" role="button" rel="nofollow" class="social__button__link"
			            style="; background-color:#3b5998; color:#fff" target="_blank">
			            <span class="social__button__icon" style="">
			              <svg width="32px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 32">
			                <path fill="#3b5998" d="M17.1 0.2v4.7h-2.8q-1.5 0-2.1 0.6t-0.5 1.9v3.4h5.2l-0.7 5.3h-4.5v13.6h-5.5v-13.6h-4.5v-5.3h4.5v-3.9q0-3.3 1.9-5.2t5-1.8q2.6 0 4.1 0.2z"></path>
			              </svg>
			            </span>
			          </a>
			        </li>
			        <li class="social__button twitter">
			          <a href="<?php echo $twUrl; ?>" title="<?php echo $tw; ?>" aria-label="<?php echo $tw; ?>" role="button" rel="noopener nofollow" class="social__button__link"
			            style="; background-color:#55acee; color:#fff" target="_blank">
			            <span class="social__button__icon" style="">
			              <svg width="32px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 32">
			                <path fill="#55acee"
			                  d="M29.7 6.8q-1.2 1.8-3 3.1 0 0.3 0 0.8 0 2.5-0.7 4.9t-2.2 4.7-3.5 4-4.9 2.8-6.1 1q-5.1 0-9.3-2.7 0.6 0.1 1.5 0.1 4.3 0 7.6-2.6-2-0.1-3.5-1.2t-2.2-3q0.6 0.1 1.1 0.1 0.8 0 1.6-0.2-2.1-0.4-3.5-2.1t-1.4-3.9v-0.1q1.3 0.7 2.8 0.8-1.2-0.8-2-2.2t-0.7-2.9q0-1.7 0.8-3.1 2.3 2.8 5.5 4.5t7 1.9q-0.2-0.7-0.2-1.4 0-2.5 1.8-4.3t4.3-1.8q2.7 0 4.5 1.9 2.1-0.4 3.9-1.5-0.7 2.2-2.7 3.4 1.8-0.2 3.5-0.9z">
			                </path>
			              </svg>
			            </span>
			          </a>
			        </li>

			        <li class="social__button whatsapp"><a href="<?php echo $waUrl; ?>" title="<?php echo $wa; ?>" aria-label="<?php echo $wa; ?>" role="button"
			            rel="noopener nofollow" class="social__button__link" style="background-color: #34af23; color:#fff;" target="_blank">
			            <span class="social__button__icon" style="">
			              <svg width="32px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
			                <path fill="#34af23"
			                  d="M17.6 17.4q0.2 0 1.7 0.8t1.6 0.9q0 0.1 0 0.3 0 0.6-0.3 1.4-0.3 0.7-1.3 1.2t-1.8 0.5q-1 0-3.4-1.1-1.7-0.8-3-2.1t-2.6-3.3q-1.3-1.9-1.3-3.5v-0.1q0.1-1.6 1.3-2.8 0.4-0.4 0.9-0.4 0.1 0 0.3 0t0.3 0q0.3 0 0.5 0.1t0.3 0.5q0.1 0.4 0.6 1.6t0.4 1.3q0 0.4-0.6 1t-0.6 0.8q0 0.1 0.1 0.3 0.6 1.3 1.8 2.4 1 0.9 2.7 1.8 0.2 0.1 0.4 0.1 0.3 0 1-0.9t0.9-0.9zM14 26.9q2.3 0 4.3-0.9t3.6-2.4 2.4-3.6 0.9-4.3-0.9-4.3-2.4-3.6-3.6-2.4-4.3-0.9-4.3 0.9-3.6 2.4-2.4 3.6-0.9 4.3q0 3.6 2.1 6.6l-1.4 4.2 4.3-1.4q2.8 1.9 6.2 1.9zM14 2.2q2.7 0 5.2 1.1t4.3 2.9 2.9 4.3 1.1 5.2-1.1 5.2-2.9 4.3-4.3 2.9-5.2 1.1q-3.5 0-6.5-1.7l-7.4 2.4 2.4-7.2q-1.9-3.2-1.9-6.9 0-2.7 1.1-5.2t2.9-4.3 4.3-2.9 5.2-1.1z">
			                </path>
			              </svg>
			            </span>
			          </a>
			        </li>
			        <li class="social__button telegram">
			          <a href="<?php echo $tgUrl; ?>" title="<?php echo $tg; ?>" aria-label="<?php echo $tg; ?>" role="button" rel="noopener nofollow"
			            class="social__button__link" style="; background-color:#0088cc; color:#fff" target="_blank">
			            <span class="social__button__icon" style="">
			              <svg width="32px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
			                <path fill="#0088cc" d="M30.8 6.5l-4.5 21.4c-.3 1.5-1.2 1.9-2.5 1.2L16.9 24l-3.3 3.2c-.4.4-.7.7-1.4.7l.5-7L25.5 9.2c.6-.5-.1-.8-.9-.3l-15.8 10L2 16.7c-1.5-.5-1.5-1.5.3-2.2L28.9 4.3c1.3-.5 2.3.3 1.9 2.2z"></path>
			              </svg>
			            </span>
			          </a>
			        </li>
			      </ul>
			    </div>
			  </div>
			</div>
		<?php
		endwhile; // End of the loop.
get_footer();
