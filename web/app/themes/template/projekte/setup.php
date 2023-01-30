<?php

add_action('init', function () {
   $labels = [
      'name' => __('Projekte', 'mg'),
      'singular_name' => __('Projekt', 'mg'),
   ];

   $args = [
      'label' => __('Projekte', 'mg'),
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
      'rewrite' => ['slug' => 'projekte', 'with_front' => true],
      'query_var' => true,
      'supports' => ['title', 'revisions'],
   ];

   register_post_type('projekte', $args);

   $labels = array(
      'name' => __( 'Kategorien', 'mg' ),
      'singular_name' => __( 'Kategorie', 'mg' ),
   ); 

   register_taxonomy('kategorie','projekte',array(
      'labels' => $labels,
      'hierarchical' => true,
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'kategorie' ),
  ));

}, 5 );

/**
 * Redirect Archive-Page
 */
add_action( 'template_redirect', function() {
   if( is_post_type_archive( 'projekte' ) ) {
      wp_redirect( home_url( '/#projekte' ), 301 );
      exit();
   }
});

require_once 'acf.php';
