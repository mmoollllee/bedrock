<?php

/**
 * Elemente
 */
$element = new StoutLogic\AcfBuilder\FieldsBuilder('element');
$element
   ->addSelect('layout', [
      'label' => 'Layout',
      'required' => 0,
      'allow_null' => 1,
      'multiple' => 1,
      'ui' => 1,
      'choices' => [
         'slider-horizontal' => 'Slider horizontal',
         'mansory-filter' => 'Grid mit Filter',
         'has-title' => 'mit Titel',
         'projekte' => 'Projekte einblenden',
         'team' => 'Team einblenden'
      ],
   ])
   ->addRelationship('element', [
      'label' => 'Element',
      'post_type' => ['elemente'],
      'taxonomy' => '',
      'filters' => [0 => 'search', 1 => 'post_type'],
      'return_format' => 'id',
   ])
      ->conditional('layout', '!=', 'projects')
         ->and('layout', '!=', 'team')
   ->addFields($options)
   ->addFields($code);