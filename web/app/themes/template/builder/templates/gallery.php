<?php

//TODO: Replace swiper classes with fancybox stuff
	
	$layout = get_sub_field("layout");

	$layout_map = [
		'some-layout' => 'has these different classes',
	];

	$gallery_map = [
		'slider' => '',
	];
	$layout_classes = [];
	$gallery_classes = [];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
		$gallery_classes[] = array_key_exists($value, $gallery_map) ? $gallery_map[$value] : $value;
	}

	$images = get_sub_field('bilder');

	if (in_array('fullwidth', $layout)) {
		$container = "";
	}

	if ($images):
?>

<div class="<?php the_classes(['gallery', $container, ...$layout_classes ]); ?>">
	<?php if (in_array('has-title', $layout) && !$has_title && $title) : ?>
		<h2><?= $title; ?></h2>
	<?php endif; ?>

	<?php if (in_array('slider', $layout)): ?>
		<div class="carousel">
		<?php foreach( $images as $image ): ?>
			<figure class="<?php the_classes(['carousel__slide',  ...$gallery_classes]); ?>">
				<?php if (in_array('has-links', $layout)) : ?>
				<a href="<?= $image['sizes']['large']; ?>" data-image-caption="<?= $image['caption'] ?>" title="<?= $image['title'] ?>" data-fancybox="gallery<?= get_row_index(); ?>">
				<?php endif; ?>
					<img <?= acf_responsive_image($image['ID'], 'slider') ?> />
				<?php if (in_array('has-links', $layout)): ?>
				</a>
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="inner">
		<?php foreach( $images as $image ):?>
			<figure class="<?php the_classes(['col',  ...$gallery_classes]); ?>">
				<?php if (in_array('has-links', $layout)) : ?>
				<a href="<?= $image['sizes']['large']; ?>" data-image-caption="<?= $image['caption'] ?>" title="<?= $image['title'] ?>" data-fancybox="gallery<?= get_row_index(); ?>">
				<?php endif; ?>
					<img <?= acf_responsive_image($image['ID'], 'medium') ?> />
				<?php if (in_array('has-links', $layout)): ?>
				</a>
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<!--childs-->
</div>

<?php endif; ?>
