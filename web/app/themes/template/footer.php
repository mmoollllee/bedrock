</main>

	<footer id="footer">
		<div class="container row text-center text-md-left align-items-center">
			<div class="col-12 mt-n4 pt-1 position-relative">
				<?php the_field('intro','option'); ?>
			</div>
			<div class="col-12 mt-2 font-150">
			<?php 
				$facebook = get_field('facebook', 'option');
				$instagram = get_field('instagram', 'option');
			?>
			<?php if ($facebook): ?>
				<a href="<?= $facebook['url']; ?>" title="<?= $facebook['title']; ?>" <?= $facebook['target'] ? 'target="'.$facebook['target'].'"' : ''; ?> class="icon-facebook-square"></a>
			<?php endif; ?>
			<?php if ($facebook): ?>
				<a href="<?= $instagram['url']; ?>" title="<?= $instagram['title']; ?>" <?= $instagram['target'] ? 'target="'.$instagram['target'].'"' : ''; ?> class="icon-instagram-brands"></a>
			<?php endif; ?>
			</div>

			<div class="col-12 col-md justify-self-end text-md-right">
				<?php wp_nav_menu([
       'theme_location' => 'footer',
       'container' => false,
       'menu_class' => 'p-2',
       'depth' => 0,
    ]); ?>
			</div>
		</div>
	</footer>

 </div><!--#wrapper-->

<nav id="responsivemenu">
	<a href="<?php bloginfo('url'); ?>">
		<img class="logo pb-2" width="60px" src="<?php the_field('logo', 'option' ); ?>" alt="<?php bloginfo('name'); ?>" />
	</a>
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
