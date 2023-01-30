</main>

	<footer id="footer" class="bg-red">
		<div class="container row text-center text-md-left align-items-center">
			<div class="col-12 col-md-auto">
				<a class="logo" href="<?php bloginfo('url'); ?>">
					<img class="logo" src="<?php the_field(
        'logo_klein',
        'option'
     ); ?>" alt="<?php bloginfo('name'); ?>" />
				</a>
			</div>
			<div class="col-12 col-md-auto">
				<?php the_field('kontaktdaten_1', 'option'); ?>
			</div>
			<div class="col-12 col-md-auto">
				<?php the_field('kontaktdaten_2', 'option'); ?>
			</div>
			<div class="col-12 col-md justify-self-end text-md-right">
				<?php wp_nav_menu([
       'theme_location' => 'footer',
       'container' => false,
       'menu_class' => '',
       'depth' => 0,
    ]); ?>
			</div>
		</div>
	</footer>

 </div><!--#wrapper-->

<nav id="responsivemenu" class="bgblue">
	<?php wp_nav_menu([
    'theme_location' => 'top',
    'container' => false,
    'menu_class' => '',
    'depth' => 0,
 ]); ?>
	<?php wp_nav_menu([
    'theme_location' => 'footer',
    'container' => false,
    'menu_class' => '',
    'depth' => 0,
 ]); ?>
</nav>

<?php wp_footer(); ?>

</body>
</html>
