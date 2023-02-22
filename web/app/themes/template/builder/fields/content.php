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
         'top-padding' => 'mehr Abstand nach oben',
         'bottom-padding' => 'mehr Abstand nach unten',
      ],
   ])
   ->addFields($code);