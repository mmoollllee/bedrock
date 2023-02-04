<?php

/**
 * Elemente
 */
$element = new StoutLogic\AcfBuilder\FieldsBuilder('element');
$element
   ->addSelect('element_template', [
      'label' => 'Element Template',
      'required' => 0,
      'allow_null' => 1,
      'multiple' => 0,
      'ui' => 1,
      'choices' => [
      ],
   ])
   ->addRelationship('relationship', [
      'label' => 'IDs',
      'post_type' => ['elemente'],
      'taxonomy' => '',
      'filters' => [0 => 'search', 1 => 'post_type'],
      'return_format' => 'id',
   ])
      ->conditional('element_template', '==', 'relationship')
   ->addFields($options)
   ->addSelect('layout', [
      'label' => 'Layout',
      'required' => 0,
      'allow_null' => 1,
      'multiple' => 1,
      'ui' => 1,
      'wrapper' => ['width' => '20'],
      'choices' => [
         'mansory-filter' => 'Grid mit Filter',
         'has-title' => 'mit Titel',
      ],
   ])
   ->addFields($code);