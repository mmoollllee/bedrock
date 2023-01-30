<?php

if (function_exists('acf_add_local_field_group')):
   acf_add_local_field_group([
      'key' => 'group_58cfacff9a284',
      'title' => 'SEO',
      'fields' => [
         [
            'key' => 'field_59ca44f371f93',
            'label' => 'Indexierung',
            'name' => 'noindex',
            'type' => 'true_false',
            'instructions' =>
               'Soll dieses Seite in Suchmaschinen aufgefunden werden?',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '25',
               'class' => '',
               'id' => '',
            ],
            'message' => 'Indexieren',
            'default_value' => 1,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
         ],
         [
            'key' => 'field_58cfad03ff9a1',
            'label' => 'Meta Description',
            'name' => 'meta_description',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '',
               'class' => '',
               'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
         ],
         [
            'key' => 'field_58cfad10ff9a2',
            'label' => 'Meta Keywords',
            'name' => 'meta_keywords',
            'type' => 'text',
            'instructions' => 'Keywords durch Komma getrennt',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '',
               'class' => '',
               'id' => '',
            ],
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
         ],
      ],
      'location' => [
         [
            [
               'param' => 'options_page',
               'operator' => '==',
               'value' => 'optionen',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'post',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'page',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'standorte',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'kurse',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'elemente',
            ],
         ],
         [
            [
               'param' => 'post_type',
               'operator' => '==',
               'value' => 'steps',
            ],
         ],
      ],
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
   ]);
endif;
