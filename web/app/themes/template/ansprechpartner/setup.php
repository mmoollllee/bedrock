<?php

add_action(
   'init',
   function () {
      $labels = [
         'name' => __('Ansprechpartner', 'mg'),
         'singular_name' => __('Ansprechpartner', 'mg'),
      ];

      $args = [
         'label' => __('Ansprechpartner', 'custom-post-type-ui'),
         'labels' => $labels,
         'description' => '',
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'delete_with_user' => false,
         'show_in_rest' => false,
         'rest_base' => '',
         'rest_controller_class' => 'WP_REST_Posts_Controller',
         'has_archive' => false,
         'show_in_menu' => true,
         'show_in_nav_menus' => false,
         'exclude_from_search' => true,
         'capability_type' => 'post',
         'map_meta_cap' => true,
         'hierarchical' => true,
         'rewrite' => ['slug' => 'ansprechpartner', 'with_front' => true],
         'query_var' => true,
         'supports' => ['title', 'page-attributes'],
      ];

      register_post_type('ansprechpartner', $args);
   },
   5
);

require_once 'acf.php';
