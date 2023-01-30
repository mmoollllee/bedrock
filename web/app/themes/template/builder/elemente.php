<?php

/*
  Register element-*.php Templates für Builder-Elemente
*/

// function acf_load_elements($field) {
//    // reset choices
//    $field['choices'] = [];

//    // $field['choices']['kontaktbox'] = 'Kontaktbox anzeigen';

//    // return the field
//    return $field;
// }
// add_filter('acf/load_field/name=elements', 'acf_load_elements');

function register_elemente_cpt() {
   $labels = [
      'name' => __('Elemente', 'mg'),
      'singular_name' => __('Element', 'mg'),
   ];

   $args = [
      'label' => __('Elemente', 'mg'),
      'labels' => $labels,
      'description' => '',
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'delete_with_user' => false,
      'show_in_rest' => true,
      'rest_base' => '',
      'rest_controller_class' => 'WP_REST_Posts_Controller',
      'has_archive' => false,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'exclude_from_search' => true,
      'capability_type' => 'page',
      'map_meta_cap' => true,
      'hierarchical' => true,
      'rewrite' => false,
      'query_var' => true,
      'menu_icon' => 'dashicons-layout',
      'supports' => ['title'],
   ];

   register_post_type('elemente', $args);
}
add_action('init', 'register_elemente_cpt');
