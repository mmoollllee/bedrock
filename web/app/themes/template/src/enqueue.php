<?php

add_action('wp_enqueue_scripts', function () {
   wp_enqueue_script(
      'app',
      get_template_directory_uri() .
         '/public/app.js',
      ['jquery'],
      false,
      true
   );

});

add_action('admin_enqueue_scripts', function () {
   wp_enqueue_script(
      'backend.js',
      get_template_directory_uri() . '/public/backend.js'
   );

   wp_enqueue_style(
      'backend.css',
      get_template_directory_uri() . '/public/backend.css'
   );
});

add_action('wp_enqueue_scripts', function () {
   // Generate a random param to bypass caching
   $rand = "";
   if (defined('WP_ENV') && WP_ENV == 'development') {
      $rand = rand();
   }

   // Enqueue Template's style.css (not needed)
   wp_enqueue_style('main-style', get_stylesheet_uri(), false, $rand);

   // Enqueue our generated main.css
   wp_enqueue_style(
      'theme-main',
      get_template_directory_uri() . '/public/main.css', false, $rand
   );

});