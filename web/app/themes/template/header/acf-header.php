<?php

use StoutLogic\AcfBuilder\FieldsBuilder as Builder;

require_once(get_template_directory() . '/builder/fields/code.php');

$header = new Builder('header', [
   'title' => 'Header',
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$header
   ->addSelect('size', [
      'label' => 'Größe',
      'choices' => [
         's' => 'klein',
         'm' => 'mittel',
         'l' => 'groß'
      ],
      'wrapper' => ['width' => '50']
   ])
   ->addSelect('overlay', [
      'label' => 'Overlay Deckkraft',
      'wrapper' => ['width' => '50']
   ])
      ->addChoice('0', '0%')
      ->addChoice('10', '10%')
      ->addChoice('25', '25%')
   ->addGallery('background', [
      'label' => 'Hintergrund',
      'wrapper' => ['width' => '25']
   ])
   ->addWysiwyg('inhalt', [
      'label' => 'Inhalt',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 0,
      'wrapper' => ['width' => '40']
   ])
   ->addLink('link', [
      'wrapper' => ['width' => '35']
   ])
   ->addFields($code)

   ->setLocation('post_type', '==', 'header');

add_action('acf/init', function () use ($header) {
   acf_add_local_field_group($header->build());
});
