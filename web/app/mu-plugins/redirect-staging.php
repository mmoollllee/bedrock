<?php
/*
Plugin Name:  Redirect Staging
Plugin URI:   https://moritz-graf.de/
Description:  Redirect everybody to login-page on non-production environments.
Version:      1.0.0
Author:       Moritz Graf
Author URI:   https://moritz-graf.de/
License:      MIT License
*/

if (defined('WP_ENV') && WP_ENV == 'staging' && !is_admin()) {

  function p2fl_force_login() {
    is_user_logged_in() || auth_redirect();
  }
  add_action( 'parse_request', 'p2fl_force_login', 1 );
}
