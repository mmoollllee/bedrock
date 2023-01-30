<?php

$termine = new StoutLogic\AcfBuilder\FieldsBuilder('termine', [
   'title' => 'Termine',
   'style' => 'default', // or 'seamless'
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$termine
   ->addText('datum', [
      'label' => 'Datum',
      'instructions' => 'z.B. 14. - 16 . Januar',
      'required' => 0,
      'wrapper' => ['width' => '33'],
   ])
   ->addText('ort', [
      'label' => 'Ort',
      'instructions' => 'z.B. Messe Nürnberg',
      'required' => 0,
      'wrapper' => ['width' => '33'],
   ])
   ->addText('stand', [
      'label' => 'Standort',
      'instructions' => 'z.B. Halle & Stand',
      'required' => 0,
      'wrapper' => ['width' => '34'],
   ])
   ->addImage('logo', [
      'label' => 'Logo',
      'wrapper' => ['width' => '33'],
      'return_format' => 'array',
   ])
   ->addTextarea('beschreibung', [
      'label' => 'Beschreibung',
      'wrapper' => ['width' => '64'],
      'new_lines' => 'br',
   ])

   ->setLocation('post_type', '==', 'termine');

add_action('acf/init', function () use ($termine) {
   acf_add_local_field_group($termine->build());
});
