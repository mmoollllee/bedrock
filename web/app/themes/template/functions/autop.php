<?php

//remove_filter('the_content', 'wpautop');

// add_action('acf/init', function () {
//    remove_filter('acf_the_content', 'wpautop');
// });

// Doesn't work!?
add_filter('wpcf7_autop_or_not', '__return_false');
