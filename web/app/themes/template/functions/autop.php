<?php

//remove_filter('the_content', 'wpautop');

function acf_wysiwyg_remove_wpautop() {
   remove_filter('acf_the_content', 'wpautop');
}
//add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

// Doesn't work!?
add_filter('wpcf7_autop_or_not', '__return_false');
