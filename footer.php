
<?php $restart = get_field( 'labels_neustart', 'option' ); ?>
<?php $overview = get_field( 'labels_uebersicht', 'option' ); ?>
<?php $share = get_field( 'labels_teile_doch_mal', 'option' ); ?>

<?php $datenschutz = get_field( 'footer_datenschutz', 'option' ); ?>
<?php $impressum = get_field( 'footer_impressum', 'option' ); ?>
<?php $credits = get_field( 'footer_credits', 'option' ); ?>

<?php $contact_cta = get_field( 'footer_contact_cta', 'option' ); ?>
<?php $contact_email = get_field( 'footer_contact_email', 'option' ); ?>


<?php if ( !is_page('test') ) : ?>
<footer class="footer">
	<div class="footer__contact">
		<h2 class="footer__contact__title"><?php echo $contact_cta; ?></h2>
		<a class="footer__contact__button button button--white" href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
	</div>
	<div class="footer__info">
		<nav class="footer__nav">
			<ul class="footer__menu">
        <?php if ( is_single() ) : ?>
          <li class="footer__menu-item"><a class="footer__menu-link footer__menu-link--back" href="<?php echo home_url(); ?>"> <img class="footer__menu-icon" src="<?php echo get_theme_file_uri(); ?>/images/arrow_left.svg" alt="Zurück zur Übersicht"><?php echo $overview;?></a></li>
        <?php endif; ?>
				<li class="footer__menu-item"><a class="footer__menu-link" href="https://www.wikimedia.de/datenschutz/" target="_blank"><?php echo $datenschutz; ?></a></li>
				<li class="footer__menu-item"><a class="footer__menu-link" href="https://wikimedia.de/de/impressum" target="_blank"><?php echo $impressum; ?></a></li>
			</ul>
		</nav>
		<a class="footer__logo" href="https://wikimedia.de/" rel="noopener noreferrer">wikimedia</a>
		<div class="footer__credits">
			<p><?php echo $credits; ?><span style="border-bottom: 1px solid #e2007a;"><a href="https://allcodesarebeautiful.com/" target="_blank" style="text-decoration: none; color: #4a4a4a;"> ACB</a></span></p>
		</div>
  </div>
</footer>
<?php else: ?>
<footer class="footer--app">
  <nav class="footer--app__nav">
      <ul class="footer--app__menu">
          <li class="footer--app__menu-item"><a class="footer--app__menu-link" href="https://www.wikimedia.de/datenschutz/" target="_blank"><?php echo $datenschutz; ?></a></li>
          <li class="footer--app__menu-item"><a class="footer--app__menu-link" href="https://wikimedia.de/de/impressum" target="_blank"><?php echo $impressum; ?></a></li>
      </ul>
  </nav>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
