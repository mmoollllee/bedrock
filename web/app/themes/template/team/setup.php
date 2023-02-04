<?php

add_action(
   'init',
   function () {
      $labels = [
         'name' => __('Teammitglieder', 'mg'),
         'singular_name' => __('Teammitglied', 'mg'),
      ];

      $args = [
         'label' => __('Team', 'mg'),
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
         'rewrite' => ['slug' => 'team', 'with_front' => true],
         'query_var' => true,
         'supports' => ['title', 'revisions'],
      ];

      register_post_type('team', $args);
   },
   5
);

require_once 'acf.php';

add_filter('acf/load_field/name=element_template', function ($field) {
   $field['choices']['team'] = 'Team einblenden';
   return $field;
});
