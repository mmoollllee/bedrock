<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'vimeo-' . $block['id'];
if (!empty($block['anchor'])) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'vimeo';
if (!empty($block['className'])) {
   $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $className .= ' align' . $block['align'];
}

$vimeo = get_field('vimeo_id');

if ($vimeo): ?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr(
   $className
); ?> clear">

	<iframe data-src-name="Vimeo" data-src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?color=7ab51d&title=0&byline=0&portrait=0" frameborder="0" allow="fullscreen" allowfullscreen></iframe>

</div>
<?php else:echo 'Block bearbeiten um Vimeo ID hinzuzufügen';endif;
?>
