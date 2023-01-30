<?php get_header(); ?>

<section>
	<div class="container row justify-content-center text-center">
		
		<header class="col-12">
			<h2><?php _e('Die Seite konnte leider nicht gefunden werden.', 'mg'); ?></h2>
		</header>
		<p>
			<?php _e(
      'Wie es aussieht, wurde an dieser Stelle nichts gefunden. Möchtest du zurück zur Startseite?',
      'mg'
   ); ?>
  			<br />
			<a class="button" href="/" title="Zurück zur Startseite">Zur Startseite</a>
		</p>

	</div>
</section>

<?php get_footer();
