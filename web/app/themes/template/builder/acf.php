<?php

/**
 * This builds the whole ACF Fields for the Builder
 * File get's called from theme/functions.php
 */

require_once(get_template_directory() . '/builder/fields/options.php');
require_once(get_template_directory() . '/builder/fields/code.php');
require_once(get_template_directory() . '/builder/fields/content.php');
require_once(get_template_directory() . '/builder/fields/section.php');
require_once(get_template_directory() . '/builder/fields/gallery.php');
require_once(get_template_directory() . '/builder/fields/element.php');

/**
 * Builder Assembly
 */
$builder = new StoutLogic\AcfBuilder\FieldsBuilder('builder', [
   'title' => 'Builder',
   'style' => 'seamless',
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$builder
   ->addFlexibleContent('builder', [
      'label' => 'Builder',
      'button_label' => 'Eintrag hinzufügen',
      'wrapper' => ['id' => 'acf-pagebuilder'],
   ])

   ->addLayout('section', [
      'label' => 'Sektion',
   ])
   ->addFields($section)

   ->addLayout('html', [
      'label' => 'Inhalt',
   ])
   ->addFields($content)

   ->addLayout('gallery', [
      'label' => 'Galerie',
   ])
   ->addFields($gallery)

   // ->addLayout('element', [
   //    'label' => 'Element',
   // ])
   // ->addFields($element)

   ->setLocation('post_type', '==', 'page')
   ->or('post_type', '==', 'post')
   ->or('post_type', '==', 'elemente');

add_action('acf/init', function () use ($builder) {
   acf_add_local_field_group($builder->build());
});
