<?php

/**
 * Add's the menu-items the 'current-menu-item' class also if it's the non-related archive-page with the same slug.
 * Thanks to: https://gist.github.com/gerbenvandijk/5253921 (@gerbenvandijk, @Kelderic, @frafor1988, @Ricoder92)
 */

add_action(
   'nav_menu_css_class',
   function ($classes, $item) {
      // Getting the current post details
      global $post;

      // Get post ID, if nothing found set to NULL
      $id = isset($post->ID) ? get_the_ID() : null;

      // Checking if post ID exist...
      if (isset($id)) {
         // Getting the post type of the current post
         $current_post_type = get_post_type_object(get_post_type($post->ID));

         // Getting the rewrite slug containing the post type's ancestors
         $ancestor_slug = $current_post_type->rewrite
            ? $current_post_type->rewrite['slug']
            : '';

         // Split the slug into an array of ancestors and then slice off the direct parent.
         $ancestors = explode('/', $ancestor_slug);
         $parent = array_pop($ancestors);

         // Getting the URL of the menu item
         $menu_slug = strtolower(trim($item->url));

         // Remove domain from menu slug
         $menu_slug = str_replace($_SERVER['SERVER_NAME'], '', $menu_slug);

         // If the menu item URL contains the post type's parent
         if (
            !empty($menu_slug) &&
            !empty($parent) &&
            strpos($menu_slug, $parent) !== false
         ) {
            $classes[] = 'current-menu-item';
         }

         // If the menu item URL contains any of the post type's ancestors
         foreach ($ancestors as $ancestor) {
            if (
               !empty($menu_slug) &&
               !empty($ancestor) &&
               strpos($menu_slug, $ancestor) !== false
            ) {
               $classes[] = 'current-page-ancestor';
            }
         }
      }
      // Return the corrected set of classes to be added to the menu item
      return $classes;
   },
   10,
   2
);
