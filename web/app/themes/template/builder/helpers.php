<?php

function sort_parts($template, $content, $title = '', $anchor = false) {
   $close = ''; $return = '';

   // replace title tag
   if ($title) {
      $template = str_replace(
         '<!--title-->',
         $title,
         $template
      );
      $content = str_replace(
         '<!--title-->',
         $title,
         $content
      );
   }

   if ($anchor) {
      $template = str_replace(
         '<!--anchor-->',
         $anchor,
         $template
      );
      $content = str_replace(
         '<!--anchor-->',
         $anchor,
         $content
      );
   }

   $parts = preg_split(
      '/(<!--content-->|<!--childs-->)/',
      $template
   );
   preg_match_all(
      '/(<!--content-->)|(<!--childs-->)/',
      $template,
      $matches,
      PREG_PATTERN_ORDER
   );

   $return .= $parts[0];

   if (isset($matches[0][0]) && isset($matches[0][1])) {
      if (
         $matches[0][0] == '<!--content-->' &&
         $matches[0][1] == '<!--childs-->'
      ) {
         $return .= $content;
         $return .= $parts[1];
         $close .= $parts[2] . ' ';
      } elseif (
         $matches[0][0] == '<!--childs-->' &&
         $matches[0][1] == '<!--content-->'
      ) {
         $close .= $parts[1];
         $close .= $content;
         $close .= $parts[2] . ' ';
      }
   } elseif (isset($matches[0][0]) && $matches[0][0] == '<!--childs-->') {
      $close .= $parts[1] . ' ';
   } else {
      $return .= $content;
      if (isset($parts[1])) {
         $close .= $parts[1] . ' ';
      }
   }

   return [
      'return' => $return,
      'close' => $close
   ];
}

// Automated Slug generation from title field.
// add_filter('acf/save_post' , function($post_id) {
//    // Identifiers
//    $builder_id = 'field_builder_builder';
//    $title_id = 'field_builder_builder_html_title';
//    $slug_id = 'field_builder_builder_html_slug';

//    $rows = isset($_POST['acf'][$builder_id]) ? $_POST['acf'][$builder_id] : false;
//    if($rows && count($rows) > 0 && !empty($rows) ):
//       foreach($rows as $key=>$row):
//          $title = isset($row[$title_id]) ? $row[$title_id] : false;
//          $slug = isset($row[$slug_id]) ? $row[$slug_id] : false;
//          if($title && !$slug) {
//             $new_slug = sanitize_title($title);
//             $_POST['acf'][$builder_id][$key][$slug_id] = $new_slug;
//          }
//       endforeach;
//    endif;
// }, 1 );

function the_classes($classes) {
   $classes = array_unique($classes);
   echo implode(' ', $classes);
}

function build_link($link, $classes = false) {
   $defaults = [
      'url' => '#',
      'title' => false,
      'target' => false,
   ];
   $args = wp_parse_args($link, $defaults);

   $target = $args['target'] ? 'target="'.$link['target'].'"' : '';

   $out1 = '<a href="'.$args['url'].'" title="'.$args['title'].'" '.$target.' '.$classes.'>';

   return $out1;

}
