<?php

add_action(
   'init',
   function () {
      $labels = [
         'name' => __('Aktuelles', 'mg'),
         'singular_name' => __('Aktuelles Eintrag', 'mg'),
      ];

      $args = [
         'labels' => $labels,
         'public' => true,
         'hierarchical' => true,
         'publicly_queryable' => true,
         'rewrite' => ['slug' => 'aktuelles'],
         'supports' => ['title', 'revisions'],
         'has_archive' => true,
      ];

      register_post_type('aktuelles', $args);
   },
   5
);
