<?php

$slider = new StoutLogic\AcfBuilder\FieldsBuilder('slider', [
   'title' => 'Slider',
   'style' => 'default', // or 'seamless'
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$slider
   ->addRepeater('slider', [
      'button_label' => 'Slide hinzufügen',
      'layout' => 'block',
   ])
   ->addImage('bild', [
      'label' => 'Bilder',
      'required' => 1,
      'preview_size' => 'thumbnail',
      'wrapper' => ['width' => '50'],
   ])
   ->addWysiwyg('beschreibung', [
      'label' => 'Beschreibung',
      'instructions' => 'Text welcher über dem Bild erscheint',
      'media_upload' => 0,
      'wrapper' => ['width' => '50'],
   ])
   ->addLink('link', [
      'label' => 'Verlinkung',
      'instructions' => 'Zieladresse des Slides.',
      'wrapper' => ['width' => '50'],
   ])
   ->addWysiwyg('beschriftung', [
      'label' => 'Beschriftung',
      'instructions' => 'Überschreibt den Button-Block',
      'required' => 0,
      'rows' => 3,
      'new_lines' => 'br',
      'wrapper' => ['width' => '50'],
   ])

   ->setLocation('post_type', '==', 'aktuelles')
   ->or('post_type', '==', 'dienstleistungen')
   ->or('post_type', '==', 'produkte')
   ->or('post_type', '==', 'page')
   ->or('post_type', '==', 'post');

add_action('acf/init', function () use ($slider) {
   acf_add_local_field_group($slider->build());
});
