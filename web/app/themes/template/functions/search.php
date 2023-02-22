<?php
/**
 * Posts und Postmeta Tabellen verbinden
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */

add_filter('posts_join', function ( $join ) {
	global $wpdb;

	if ( is_search() ) {    
		 $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}

	return $join;
});

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
add_filter( 'posts_where', function ( $where ) {
	global $pagenow, $wpdb;

	if ( is_search() ) {
		 $where = preg_replace(
			  "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			  "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	}

	return $where;
});

/**
* Prevent duplicates
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
*/
add_filter( 'posts_distinct', function ( $where ) {
	global $wpdb;

	if ( is_search() ) {
		 return "DISTINCT";
	}

	return $where;
});



/**
 * Disable search
 */
add_action('wp', function () {
  global $post;
  if (is_search()) {
      global $wp_query;
      $wp_query->set_404();
      status_header(404);
  }
});