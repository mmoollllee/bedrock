<?php
	$layout = get_sub_field("layout");

	$layout_map = [
		'some-layout' => 'has these different classes',
	];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
	}

	$code = sort_parts(get_sub_field('code'), $content, $title);

	$has_title = in_array('has-title', $layout) && !$has_title && $title;
?>

<section class="<?php the_classes([$container, ...$layout_classes]); ?>">
	<?php if (($content || $has_title) && empty($code['close'])): ?>
	<div class="container intro">
		<div class="row">
			<?php echo $slug ? '<div class="anchor" id="'.$slug.'"></div>' : ''; ?>
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
			<?php echo $slug ? '<div class="anchor" id="'.$slug.'"></div>' : ''; ?>
			<!--content-->
		<?= $code['close'] ?>
	<?php else: ?>
		<?php echo $slug ? '<div class="anchor" id="'.$slug.'"></div>' : ''; ?>
		<!--childs-->
	<?php endif; ?>
</section>
