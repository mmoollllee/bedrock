<?php
	$layout = get_sub_field("layout");

	$layout_map = [
		'top-padding' => 'pt-4 mt-3',
		'bottom-padding' => 'pb-5',
	];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
	}

	$code = sort_parts(get_sub_field('code'), $content, $title, $anchor);
?>

<?php 
	if (isset($code['close']) && !empty($code['close'])) {
		echo $code['return'];
		echo '<!--childs-->';
?>
<?php
		echo $code['close'];
	} else {
?>
	<div class="<?php the_classes(['content', $container, ...$layout_classes]); ?>">
		<?= $anchor ?>
		<?php if (in_array('has-title', $layout) && !$has_title && $title): ?>
			<?php if ($hierarchie == 0) { ?>
				<h2><!--title--></h2>
			<?php } else { ?>
				<h3><!--title--></h3>
			<?php } ?>
		<?php endif; ?>
		<!--content-->
	</div>
<?php
	}
?>
