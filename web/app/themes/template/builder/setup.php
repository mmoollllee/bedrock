<?php

require_once 'helpers.php';
require_once 'builder.php';
require_once 'acf.php';
require_once 'elemente.php';

add_action('admin_enqueue_scripts', function () {
   wp_enqueue_script(
      'mg_builder_script',
      get_template_directory_uri() . '/builder/js/builder.js'
   );
   wp_enqueue_style(
      'mg_builder_style',
      get_template_directory_uri() . '/public/builder.css',
      false
   );
   if (!current_user_can('administrator')) {
      wp_enqueue_script(
         'mg_builder_script_restrict',
         get_template_directory_uri() . '/builder/js/builder-restrict.js',
         ['mg_builder_script']
      );
      wp_enqueue_style(
         'mg_builder_restrict',
         get_template_directory_uri() . '/public/builder-restrict.css',
         false
      );
   }
});