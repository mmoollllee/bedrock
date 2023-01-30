<?php

$content = new StoutLogic\AcfBuilder\FieldsBuilder('content');
$content
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
         'has-title' => 'mit Titel',
         'bg-gray' => 'grauer Hintergrund',
         'top-padding' => 'Abstand nach oben',
         'bottom-padding' => 'Abstand nach unten',
         'text-start' => 'Text links ausrichten'
      ],
   ])
   ->addFields($code);