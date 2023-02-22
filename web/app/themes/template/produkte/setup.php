<?php

add_action('init', function () {
   $labels = [
      'name' => __('Artikel', 'mg'),
      'singular_name' => __('Artikel', 'mg'),
   ];

   $args = [
      'label' => __('Artikel', 'mg'),
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
      'rewrite' => ['slug' => 'artikel', 'with_front' => true],
      'query_var' => true,
      'supports' => ['title', 'revisions'],
   ];

   register_post_type('artikel', $args);

   $labels = array(
      'name' => __( 'Artikeltypen', 'mg' ),
      'singular_name' => __( 'Artikeltyp', 'mg' ),
   ); 

   register_taxonomy('typ','artikel',array(
      'labels' => $labels,
      'hierarchical' => true,
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'type' ),
  ));

}, 5 );

// require_once 'acf.php';
