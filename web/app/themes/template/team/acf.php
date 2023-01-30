<?php

$acfbuilder = new StoutLogic\AcfBuilder\FieldsBuilder('Teammitglied', [
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$acfbuilder
   ->addImage('bild', [
      'label' => 'Bild',
      'wrapper' => ['width' => '25'],
   ])
   ->addWysiwyg('vita', [
      'label' => 'Vita',
      'wrapper' => ['width' => '45'],
   ])
   ->addTextarea('untertitel', [
      'label' => 'Untertitel',
      'wrapper' => ['width' => '30'],
      'rows' => '2',
      'new_lines' => 'br',
   ])

   ->setLocation('post_type', '==', 'team');
   
add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});
