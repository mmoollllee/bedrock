<?php

add_action('wp_head', function () {
   ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon.png">
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png" type="image/png" sizes="32x32" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png" type="image/png" sizes="16x16" />

    <!-- launcher (Android/Chrome) -->
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/site.webmanifest">

    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicons/safari-pinned-tab.svg" color="#579189">

    <meta name="msapplication-TileColor" content="#579189">
    <meta name="theme-color" content="#579189">

<?php
});
