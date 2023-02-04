<?php

/**
 * Adds Custom Fields to Video-Attachements to add video-files for a poster image
 */

$videos = new StoutLogic\AcfBuilder\FieldsBuilder('Videos');
$videos
   ->addFile('mp4', [
      'label' => 'MP4 Video'
   ])
   ->addFile('webm', [
      'label' => 'WebM Video'
   ])
      ->setLocation('attachment', '==', 'image');

add_action('acf/init', function () use ($videos) {
   acf_add_local_field_group($videos->build());
});

function video_or_image($args = false) {
   $defaults = [
      'id' => false,
      'field' => false
   ];
   $args = wp_parse_args($args, $defaults);

   $mp4 = get_field('mp4', $args['id']);
   $webm = get_field('webm', $args['id']);

   // Check if the image's-fields for video-files are set
   if ($mp4 && $webm) {
      $poster_src = wp_get_attachment_image_url( $args['id'], 'full' );
      $output = '<video poster="' . $poster_src .'" playsinline muted autoplay loop>';
      $output .= '<source src="' . $mp4['url'] .'" type="video/mp4">';
      $output .= '<source src="' . $webm['url'] .'" type="video/webm">';
      $output .= '</video>';

      return $output;
   } else {
      return '<img ' . acf_responsive_image($args['id'], $args['field']) . ' />';
   }

}
