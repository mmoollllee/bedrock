<?php

use StoutLogic\AcfBuilder\FieldsBuilder as Builder;

if (
   function_exists('acf_set_options_page_menu') &&
   function_exists('acf_add_options_sub_page')
):
   acf_set_options_page_menu('optionen');
   acf_add_options_sub_page([
      'page_title' => __('Optionen', 'mg'),
      'menu_title' => __('Optionen', 'mg'),
      'menu_slug' => 'optionen',
   ]);
endif;

if (function_exists('acf_add_local_field_group')):
   /*
	Add Logo Fields
*/

   acf_add_local_field_group([
      'key' => 'group_5c88ede69567e',
      'title' => 'Logo',
      'fields' => [
         [
            'key' => 'field_5c88edeabc778',
            'label' => 'Logo',
            'name' => 'logo',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '33',
               'class' => '',
               'id' => '',
            ],
            'return_format' => 'url',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
         ],
         [
            'key' => 'field_5c9943be281b7',
            'label' => 'Logo klein',
            'name' => 'logo_klein',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '33',
               'class' => '',
               'id' => '',
            ],
            'return_format' => 'url',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
         ],
         [
            'key' => 'field_5c994586fd7d1',
            'label' => 'Logo mini',
            'name' => 'logo_mini',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
               'width' => '34',
               'class' => '',
               'id' => '',
            ],
            'return_format' => 'url',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
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
      ],
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
   ]);
endif;

/**
 * Add Kontaktdaten Fields
 */
$acfbuilder = new Builder('kontaktdaten', [
   'title' => 'Kontaktdaten',
   'style' => 'default', // or 'seamless'
   'position' => 'normal',
]);
$acfbuilder
   ->addText('firma', [
      'label' => 'Name',
      'instructions' => 'z.B. Firmenname',
      'wrapper' => [
         'width' => '34',
      ],
   ])
   ->addText('telefon-nice', [
      'label' => 'Telefonnummer',
      'instructions' => 'Im gewünschten Ausgabeformat',
      'wrapper' => [
         'width' => '33',
      ],
   ])
   ->addText('telefon-href', [
      'label' => 'Telefonnummer',
      'instructions' => 'Im Format <i>49-Vorwahl-Nummer</i>, ohne Leerzeichen,...',
      'wrapper' => [
         'width' => '33',
      ],
   ])
   ->addEmail('mail', [
      'label' => 'Emailadresse',
      'wrapper' => [
         'width' => '34',
      ]
   ])
   ->addText('fax-nice', [
      'label' => 'Faxnummer',
      'instructions' => 'Im gewünschten Ausgabeformat',
      'wrapper' => [
         'width' => '33',
      ],
   ])
   ->addText('fax-href', [
      'label' => 'Faxnummer',
      'instructions' => 'Im Format <i>49-Vorwahl-Nummer</i>, ohne Leerzeichen,...',
      'wrapper' => [
         'width' => '33',
      ],
   ])
   ->addTextarea('anschrift', [
      'label' => 'Anschrift',
      'instructions' => 'Straße & Nr, PLZ & Ort, Land',
      'rows' => '2',
      'new_lines' => 'br',
      'wrapper' => [
         'width' => '33',
      ],
   ])
   ->addLink('instagram', [
      'label' => 'Instagram',
      'wrapper' => [
         'width' => '33',
      ]
   ])
   ->addLink('facebook', [
      'label' => 'Facebook',
      'wrapper' => [
         'width' => '33',
      ]
   ])
   ->addWysiwyg('oeffnungszeiten', [
      'label' => 'Öffnungszeiten',
      'instructions' => 'Mit allen künstlerischen Freiheiten',
      'media_upload' => 0,
      'toolbar' => 'basic',
      'wrapper' => [
         'width' => '33',
         'class' => 'textarea-small'
      ],
   ])

   ->setLocation('options_page', '==', 'optionen');

add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});


/**
 * Add Notification Banner Fields
 */
$acfbuilder = new Builder('notification-banner', [
   'title' => 'Notification Banner',
   'style' => 'default', // or 'seamless'
   'position' => 'normal',
]);
$acfbuilder
   ->addTrueFalse('notification-banner-active', [
      'label' => 'Banner',
      'message' => 'Banner anzeigen',
      'wrapper' => ['width' => '80'],
   ])
   ->addSelect('notification-layout', [
      'label' => 'Layout',
      'required' => 0,
      'wrapper' => ['width' => '20'],
      'allow_null' => 1,
      'multiple' => 1,
      'ui' => 1,
      'choices' => [
         'bg-dark' => 'dunkler Hintergrund',
         'button' => 'Link als Button'
      ],
   ])
   ->addImage('notification-banner-icon', [
      'label' => 'Icon',
      'wrapper' => [
         'width' => '25',
      ]
   ])
   ->addTextarea('notification-banner-text', [
      'label' => 'Text',
      'rows' => '2',
      'new_lines' => 'br',
      'wrapper' => [
         'width' => '50',
      ]
   ])
   ->addLink('notification-banner-url', [
      'label' => 'Button',
      'wrapper' => [
         'width' => '25',
      ]
   ])

   ->setLocation('options_page', '==', 'optionen');

add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});

/**
 * Footer-Area
 */
$acfbuilder = new Builder('footer', [
   'title' => 'Fußbereich',
   'style' => 'default', // or 'seamless'
   'position' => 'normal',
]);
$acfbuilder
   ->addWysiwyg('intro', [
      'label' => 'Intro'
   ])

   ->setLocation('options_page', '==', 'optionen');

add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});
