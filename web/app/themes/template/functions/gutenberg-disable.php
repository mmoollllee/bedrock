<?php

/*
  Disable Gutenberg by default
  Readme: https://digwp.com/2018/12/enable-gutenberg-block-editor/
*/

// Disable
add_filter('use_block_editor_for_post', '__return_false', 5);

// Enable Gutenberg for WordPress >= 5.0
add_filter(
   'use_block_editor_for_post',
   function ($can_edit, $post) {
      if ('post' === $post->post_type || 'aktuell' === $post->post_type) {
         return true;
      }

      return false;
   },
   9,
   2
);

// Enable Gutenberg for WordPress >= 5.0
add_filter(
   'use_block_editor_for_post',
   function ($can_edit, $post) {
      $disabled_posts = [3, 162, 22, 2, 47, 34];

      if (empty($post->ID)) {
         return $can_edit;
      }

      $enablegutenberg = get_field('enablegutenberg', $post->ID) ?? false;
      if ($enablegutenberg) {
         return true;
      }

      if (!in_array($post->ID, $disabled_posts) && $can_edit) {
         return true;
      }

      return false;
   },
   10,
   2
);

// Hide Builder if it's Gutenberg
add_action('admin_head', function () {
   ?>
	<style>
		.block-editor #acf-group_builder {			
			display: none !important
		}
	</style>
	<?php
});

/**
 * ACF Editor Settings
 */

$slug = 'editorsettings';
$acfbuilder = new StoutLogic\AcfBuilder\FieldsBuilder($slug, [
   'title' => 'Editor Einstellungen',
   'style' => 'normal',
   'position' => 'side',
]);

$acfbuilder
   ->addTrueFalse('enablegutenberg', [
      'message' => 'Gutenberg Editor aktivieren',
   ])
   ->setLocation('post_type', '==', 'page')
   ->or('page_type', '==', 'post');

add_action('acf/init', function () use ($acfbuilder) {
   acf_add_local_field_group($acfbuilder->build());
});
