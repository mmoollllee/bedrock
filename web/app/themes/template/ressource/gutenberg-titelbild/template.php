<?php

$slug = 'titelbild';

// Create id attribute allowing for custom "anchor" value.
$id = $slug . '-' . $block['id'];
if (!empty($block['anchor'])) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = $slug;
if (!empty($block['className'])) {
   $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $className .= ' align' . $block['align'];
}

$innertemplate = [
   [
      'core/group',
      [
         'className' => 'col-6',
      ],
      [
         [
            'core/heading',
            [
               'content' => 'Überschrift',
               'level' => 3,
            ],
         ],
         [
            'core/paragraph',
            [
               'content' => 'Einleitungstext',
            ],
         ],
      ],
   ],
];

$bilder = get_field('bilder');
?>

<div id="<?php echo esc_attr($id); ?>" class="text-center <?php echo esc_attr(
   $className
); ?>">

    <?php if ($bilder): ?>

        <div class="slider" data-flickity='{ 
                    "lazyLoad": 2,
                    "prevNextButtons": true,
                    "autoPlay": true
                }'>
            <?php foreach ($bilder as $bild): ?>
                <figure class="col-12">
                    <img src="<?php echo $bild['sizes'][
                       'slider-low'
                    ]; ?>" data-flickity-lazyload="<?php echo $bild['sizes'][
   'slider'
]; ?>" alt="<?php echo $bild['title']; ?>" />
                </figure>
            <?php endforeach; ?>
        </div>

    <?php else:echo 'Block bearbeiten um Titelbild und Einleitung hinzuzufügen';endif; ?>

    <?php echo '<InnerBlocks template="' .
       esc_attr(wp_json_encode($innertemplate)) .
       '"/>'; ?>

</div>
