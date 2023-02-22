<?php

$gallery = new StoutLogic\AcfBuilder\FieldsBuilder('gallery');
$gallery
   ->addGallery('bilder', [
      'label' => 'Bilder',
   ])
   ->addFields($options)
   ->addSelect('layout', [
      'label' => 'Layout',
      'required' => 0,
      'wrapper' => ['width' => '20'],
      'allow_null' => 1,
      'multiple' => 1,
      'ui' => 1,
      'choices' => [
         'has-title' => 'mit Titel',
         'has-links' => 'Bilder klickbar',
         'fullwidth' => 'Volle Breite'
      ],
   ])
   ->addFields($code);
