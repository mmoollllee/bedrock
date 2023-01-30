<?php

add_filter('breadcrumb_trail_inline_style', '__return_false');

add_action('after_setup_theme', function () {
   add_theme_support('breadcrumb-trail');
});

add_filter('breadcrumb_trail_items', function ($items) {
   if (get_post_type() == 'aktuelles') {
      $items[2] = $items[1];
      $items[1] =
         "<a href='" .
         get_bloginfo('url') .
         "' title='Zur Startseite'>Aktuelles</a>";
   }
   return $items;
});

/*
add_filter('breadcrumb_trail_items', 'change_breadcrump');
	function change_breadcrump($items) {
		if( $items[3] == "Programmierhilfen") {
			unset($items[2]);
		}
		if(!empty($_GET['s'])) {
			array_push($items, "Suchergebnisse f&uuml;r &quot;".$_GET['s']."&quot;");
		}
		return $items;
	}
*/
