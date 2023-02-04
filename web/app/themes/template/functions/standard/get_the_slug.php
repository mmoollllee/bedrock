<?php

if (!function_exists('get_the_slug')) {
   /**
    * Returns the page or post slug.
    *
    * @param int|WP_Post|null $id (Optional) Post ID or post object. Defaults to global $post.
    * @return string
    */
   function get_the_slug($id = null) {
      $post = get_post($id);
      if (!empty($post)) {
         return $post->post_name;
      }
      return ''; // No global $post var or matching ID available.
   }
   /**
    * Display the page or post slug
    *
    * Uses get_the_slug() and applies 'the_slug' filter.
    *
    * @param int|WP_Post|null $id (Optional) Post ID or post object. Defaults to global $post.
    */
   function the_slug($id = null) {
      echo apply_filters('the_slug', get_the_slug($id));
   }
}
