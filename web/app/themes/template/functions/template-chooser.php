<?php

/*
  Funktionen um Wordpress je nach Fall das richtige Template unterzujubeln.
  z.B. auch für die 404-Seite.
*/

// add_filter( 'page_template', function($template){
//   global $post;
//   $chooser = sub_or_single();

//   if ( $chooser == "sub" ) {
//     $template = get_stylesheet_directory() . '/page-mietpark-sub.php';
//   } elseif ( $chooser == "single" ) {
//     $template = get_stylesheet_directory() . '/page-mietpark-single.php';
//   }
//   return $template;
// });
