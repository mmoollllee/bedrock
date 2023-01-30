<?php

/**
 * No Password-Mail
 */
add_filter('send_password_change_email', '__return_false');

/**
 * Disable WP Emojicons
 */
add_action('init', function () {
   remove_action('admin_print_styles', 'print_emoji_styles');
   remove_action('wp_head', 'print_emoji_detection_script', 7);
   remove_action('admin_print_scripts', 'print_emoji_detection_script');
   remove_action('wp_print_styles', 'print_emoji_styles');
   remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
   remove_filter('the_content_feed', 'wp_staticize_emoji');
   remove_filter('comment_text_rss', 'wp_staticize_emoji');
   //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
});

/**
 * Deregister embed
 */
add_action('wp_footer', function () {
   wp_deregister_script('wp-embed');
});

/**
 * Tidy Header
 */
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * HTML Output
 */
add_theme_support('html5', [
   'comment-form',
   'comment-list',
   'gallery',
   'caption',
]);

/**
 * Remove Comments Menu
 */
add_action('admin_menu', function () {
   remove_menu_page('edit-comments.php');
});
add_action(
   'admin_bar_menu',
   function ($wp_admin_bar) {
      $wp_admin_bar->remove_node('ab-item');
   },
   999
);

/**
 * Hide Standard Edit Button
 */
add_action('admin_menu', function () {
   remove_menu_page('edit.php');
});

add_action(
   'admin_bar_menu',
   function ($wp_admin_bar) {
      $wp_admin_bar->remove_node('new-post');
   },
   999
);

add_action(
   'wp_dashboard_setup',
   function () {
      remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
   },
   999
);
