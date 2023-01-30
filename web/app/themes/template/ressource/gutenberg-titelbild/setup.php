<?php

$slug = 'titelbild';

add_action('acf/init', function () {
   // check function exists
   if (function_exists('acf_register_block')) {
      acf_register_block([
         'name' => 'titelbild',
         'title' => __('Titelbild'),
         'description' => __('Titelbild mit Einleitung'),
         'render_callback' => 'render_callback',
         'category' => 'layout',
         'icon' => 'align-full-width',
         'keywords' => ['deli'],
         'mode' => 'edit',
         'supports' => [
            'align' => ['full', 'wide'],
            'jsx' => true,
         ],
      ]);
   }
});

function render_callback($block) {
   $slug = str_replace('acf/', '', $block['name']);

   if (file_exists(get_theme_file_path("/gutenberg-{$slug}/template.php"))) {
      include get_theme_file_path("/gutenberg-{$slug}/template.php");
   }
}

$acfbuilder = new StoutLogic\AcfBuilder\FieldsBuilder($slug, [
   'title' => $slug,
   'style' => 'default', // or 'seamless'
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$acfbuilder
   // ->addSelect('spalten', [
   // 	'label' => 'Spaltenanzahl',
   // 	'required' => 1
   // ])
   // 	->addChoice('1', '1 Spalte')
   // 	->addChoice('2', '2 Spalten')
   // 	->addChoice('3', '3 Spalten')
   // 	->addChoice('4', '4 Spalten')
   ->addGallery('bilder', [
      'label' => 'Bilder',
      'required' => 1,
      'preview_size' => 'thumbnail',
   ])

   ->setLocation('block', '==', 'acf/' . $slug);

add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});

/**
 * Admin CSS
 */
add_action('admin_head', function () {
   ?>
	<style>
	</style>
	<?php
});
