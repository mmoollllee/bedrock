<?php

add_action('acf/init', function () {
   // check function exists
   if (function_exists('acf_register_block')) {
      acf_register_block([
         'name' => 'mg-vimeo',
         'title' => __('Vimeo'),
         'description' => __('Vimeo mit Privacy Button'),
         'render_callback' => 'mg_vimeo_block_render_callback',
         'category' => 'embed', //[ common | formatting | layout | widgets | embed ]
         'icon' => 'video-alt3', // https://developer.wordpress.org/resource/dashicons/#media-audio
         'keywords' => ['vimeo', 'video', '3sechzig'],
         'mode' => 'edit',
         'supports' => [
            'align' => false,
         ],
      ]);
   }
});

function mg_vimeo_block_render_callback($block) {
   // include a template part from within the "template-parts/block" folder
   if (
      file_exists(
         get_theme_file_path('/gutenberg-vimeo/gutenberg-template.php')
      )
   ) {
      include get_theme_file_path('/gutenberg-vimeo/gutenberg-template.php');
   }
}

require_once 'acf.php';
