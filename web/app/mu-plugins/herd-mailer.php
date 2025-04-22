<?php
/*
Plugin Name:  Herd Mailer
Plugin URI:   https://moritz-graf.de/
Description:  Redirect mails to local mailcatcher instance on local environments.
Version:      1.0.0
Author:       Moritz Graf
Author URI:   https://moritz-graf.de/
License:      MIT License
*/

if (defined('WP_ENV') && WP_ENV == 'development') {

  function herd_mailer($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = '127.0.0.1';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'WordPress';
    $phpmailer->Password = '';
  }

  add_action('phpmailer_init', 'herd_mailer');
}
