<?php

$options = new StoutLogic\AcfBuilder\FieldsBuilder('options');
$options
   ->addNumber('hierarchie', [
      'label' => 'Hierarchie',
      'wrapper' => ['class' => 'hierarchie'],
      'default_value' => 0,
   ])
   ->addTrueFalse('aktiv', [
      'label' => 'Aktiv',
      'message' => 'Aktiv',
      'wrapper' => ['width' => '20'],
      'default_value' => 1,
   ])
   ->addTrueFalse('redaktionell', [
      'label' => 'Redaktionell',
      'message' => 'Redaktioneller Inhalt',
      'wrapper' => ['width' => '20'],
      'default_value' => 1,
   ])
   ->addText('title', [
      'label' => 'Titel',
      'wrapper' => ['class' => 'title'],
      'default_value' => 'Titel',
   ])
   ->addText('slug', [
      'label' => 'ID',
      'wrapper' => ['width' => '20'],
   ]);