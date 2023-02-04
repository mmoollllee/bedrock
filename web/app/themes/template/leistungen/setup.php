<?php

add_action('init', function () {
   $labels = [
      'name' => __('Leistungen', 'mg'),
      'singular_name' => __('Leistung', 'mg'),
   ];

   $args = [
      'label' => __('Leistungen', 'mg'),
      'labels' => $labels,
      'description' => '',
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'delete_with_user' => false,
      'show_in_rest' => false,
      'rest_base' => '',
      'rest_controller_class' => 'WP_REST_Posts_Controller',
      'has_archive' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'exclude_from_search' => true,
      'capability_type' => 'post',
      'map_meta_cap' => true,
      'hierarchical' => true,
      'rewrite' => ['slug' => 'leistungen', 'with_front' => true],
      'query_var' => true,
      'supports' => ['title', 'revisions'],
   ];

   register_post_type('leistungen', $args);

}, 5 );

/**
 * Redirect Archive-Page
 */
add_action( 'template_redirect', function() {
   if( is_post_type_archive( 'leistungen' ) ) {
      wp_redirect( home_url( '/#leistungen' ), 301 );
      exit();
   }
});

require_once 'acf.php';

add_filter('acf/load_field/name=element_template', function ($field) {
   $field['choices']['leistungen'] = 'Leistungen einblenden';
   return $field;
});
