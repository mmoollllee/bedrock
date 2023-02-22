<?php

register_nav_menus([
   'top' => 'Hauptmenü',
   'footer' => 'Footermenü',
]);

// Add Menu Classes
// add_filter('nav_menu_css_class', function ($classes, $item, $args) {
//    if ($args->theme_location == 'top') {
//       $classes[] = 'list-group-item flex-fill';
//    }
//    return $classes;
// }, 1, 3);
