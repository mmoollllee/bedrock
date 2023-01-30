<?php

add_filter('acf/load_field/name=elements', function ($field) {
   $field['choices']['termine'] = 'Termine auflisten';

   // return the field
   return $field;
});

add_action('init', function () {
   $labels = [
      'name' => __('Termine', 'mg'),
      'singular_name' => __('Termin', 'mg'),
   ];

   $args = [
      'label' => __('Termine', 'mg'),
      'labels' => $labels,
      'description' => '',
      'public' => true,
      'has_archive' => false,
      'show_in_menu' => true,
      'hierarchical' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-calendar-alt', // https://developer.wordpress.org/resource/dashicons/
      'supports' => ['title', 'revisions'],
   ];

   register_post_type('termine', $args);
});

require_once 'acf.php';
