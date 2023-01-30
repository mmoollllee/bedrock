<?php

$section = new StoutLogic\AcfBuilder\FieldsBuilder('section');
$section
   ->addWysiwyg('inhalt', [
      'label' => 'Inhalt',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 1,
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
         'text-center' => 'Alles zentrieren',
         'has-title' => 'mit Titel',
         'bg-white' => 'weißer Hintergrund',
      ],
   ])
   ->addFields($code);