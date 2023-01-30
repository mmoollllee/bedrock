<?php
get_header();

while (have_posts()):
   the_post();

   the_content();

   builder();
endwhile;

get_footer();
