<?php

function builder($args = false) {
   $defaults = [
      'label' => 'builder',
      'post_id' => false,
      'print' => true
   ];
   $args = wp_parse_args($args, $defaults);

   $return = '';
   $hierarchie_prev = -1;
   $close = [];

   if (have_rows($args['label'], $args['post_id'])):
      while (have_rows($args['label'], $args['post_id'])):
         the_row();

         $hierarchie = get_sub_field('hierarchie');

         /* Skip fields if they are too deep, or if the previous parent was inactive */
         if ($hierarchie > $hierarchie_prev + 1) {
            continue;
         }

         /**
          * if $hierarchie is smaller or equal than previous...
          */
         if ($hierarchie <= $hierarchie_prev) {
            /* ...walk up */
            while ($hierarchie <= $hierarchie_prev) {
               if (isset($close[$hierarchie_prev])) {
                  $return .= "\n" . $close[$hierarchie_prev] . "\n";
                  /* reset $close for current $hierarchie */
                  $close[$hierarchie_prev] = '';
               }
               $hierarchie_prev--;
            }
         }

         /* Reset $close for this $hierarchie */
         $close[$hierarchie] = '';

         /**
          * Check if this one is active,
          * else walk up one hierarchie so all childs will be skipped!
          */
         if (get_sub_field('aktiv')):
            /* get current layout slug */
            $layout = explode('--', get_row_layout());
            $content = get_sub_field('inhalt') ?: '';
            $title = get_sub_field('title') ?: '';
            $slug = (get_sub_field('slug') && !empty(get_sub_field('slug')) && get_sub_field('slug') != 'false' && get_sub_field('slug') != 'titel') ? get_sub_field('slug') : '';
	         $has_title = strpos($content, '<!--title-->') !== false;
            $container = ($hierarchie == 0) ? 'container' : '';

            $layout_classes = [];
            
            ob_start();

            require 'templates/' . $layout[0] . '.php';

            $template = ob_get_contents();
            ob_end_clean();

            $parts = sort_parts($template, $content, $title);
            $return .= $parts['return'];
            $close[$hierarchie] = $parts['close'];
         else:
            $hierarchie--;
         endif;

         /* Save current $hierarchie to know where we came from in the next loop */
         $hierarchie_prev = $hierarchie;
         /* Reset content */
         $content = '';
      endwhile;

      /**
       * walk up $close and return left $close
       */
      for ($i = count($close) - 1; $i >= 0; $i--) {
         $return .= $close[$i];
      }
   endif;

   /* are we ment to return or print for debugging? */
   if ($args['print']) {
      print_r($return);
   } else {
      return $return;
   }
}

?>
