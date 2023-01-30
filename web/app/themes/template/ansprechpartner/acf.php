<?php

$acfbuilder = new StoutLogic\AcfBuilder\FieldsBuilder('Ansprechpartner', [
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$acfbuilder
   ->addTextarea('untertitel', [
      'label' => 'Untertitel',
      'wrapper' => ['width' => '30'],
      'rows' => '2',
      'new_lines' => 'br',
   ])
   ->addImage('bild', [
      'label' => 'Bild',
      'wrapper' => ['width' => '30'],
   ])

   ->setLocation('post_type', '==', 'ansprechpartner');
   
add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});
