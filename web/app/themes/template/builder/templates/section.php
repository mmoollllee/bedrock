<?php
	$layout = get_sub_field("layout");

	$layout_map = [
		'some-layout' => 'has these different classes',
	];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
	}

	$code = sort_parts(get_sub_field('code'), $content, $title, $anchor);

	$has_title = in_array('has-title', $layout) && !$has_title && $title;
?>

<section class="<?php the_classes([$container, ...$layout_classes]); ?>">
	<?php if (($content || $has_title) && empty($code['close'])): ?>
	<div class="row">
		<div class="section-content">
		<?= $anchor ?>
		<?php if ($has_title): ?>
			<h2><!--title--></h2>
		<?php endif; ?>
			<!--content-->
		</div>
	</div>
	<div class="row">
		<!--childs-->
	</div>
	<?php 
		elseif (isset($code['close']) && !empty($code['close'])):
			echo $code['return'];
	?>
			<!--childs-->
		<?= $code['close'] ?>
	<?php else: ?>
		<?= $anchor ?>
		<!--childs-->
	<?php endif; ?>
</section>
