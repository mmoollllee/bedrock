<?php

$page_settings = new StoutLogic\AcfBuilder\FieldsBuilder('Seiten-Einstellung', [
   'position' => 'acf_after_title',
   'menu_order' => -1,
]);
$page_settings
   ->addTab('Header')
   ->addRelationship('header', [
      'label' => 'Header',
      'post_type' => [0 => 'header'],
      'taxonomy' => '',
      'filters' => [0 => 'search'],
      'return_format' => 'id',
   ])

   ->setLocation('post_type', '==', 'page');

add_action('acf/init', function () use ($page_settings) {
   acf_add_local_field_group($page_settings->build());
});
