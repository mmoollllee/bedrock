<?php $loop = new WP_Query([
   'post_type' => 'termine',
   'posts_per_page' => -1,
   'orderby' => 'menu_order',
   'order' => 'ASC',
]); ?>
<?php
while ($loop->have_posts()):
   $loop->the_post(); ?>
<article class="termin col-12 col-lg-6 row align-items-center mb-2">
	<figure class="thumbnail col-4 col-md-3">
		<?php
  $logo = get_field('logo');
  if (!empty($logo)): ?>
		<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr(
   $logo['alt']
); ?>" />
		<?php endif;
  ?>
	</figure>
	<div class="col">
		<h2><?php the_title(); ?></h2>
		<p><span class="date"><?php the_field(
     'datum'
  ); ?></span> <span class="ort"><?php the_field('ort'); ?></span></p>
		<p class="description"><?php the_field('beschreibung'); ?></p>
		<p class="standort"><?php the_field('stand'); ?></p>
	</div>
</article>
<?php
endwhile;
wp_reset_query();
 ?>
