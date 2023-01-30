<?php

$code = new StoutLogic\AcfBuilder\FieldsBuilder('code');
$code
   ->addField('code', 'acf_code_field', [
      'label' => 'HTML',
      'placeholder' => '',
      'default_value' => '',
   ]);
