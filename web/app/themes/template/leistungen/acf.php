<?php

$acfbuilder = new StoutLogic\AcfBuilder\FieldsBuilder('Leistungen', [
   'position' => 'acf_after_title',
   'hide_on_screen' => [0 => 'the_content'],
]);
$acfbuilder
   ->addGallery('bilder', [
      'label' => 'Bilder',
      'wrapper' => ['width' => '34'],
   ])
   ->addWysiwyg('beschreibung', [
      'label' => 'Beschreibung',
      'wrapper' => ['width' => '33'],
   ])
   ->addWysiwyg('details', [
      'label' => 'Details',
      'wrapper' => ['width' => '33'],
   ])

   ->setLocation('post_type', '==', 'leistungen');
   
add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});

?>
