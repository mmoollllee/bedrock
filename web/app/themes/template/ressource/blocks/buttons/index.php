<?php
/**
 * Plugin Name:     Buttons
 * Description:     Example block written with ESNext standard and JSX support – build step required.
 * Version:         0.1.0
 * Author:          Moritz Graf
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     buttons
 *
 * @package         mmoollllee
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
add_action('init', function () {
   $dir = dirname(__FILE__);
   $path = get_template_directory_uri();
   $slug = basename($dir);

   $script_asset_path = "$dir/build/index.asset.php";
   if (!file_exists($script_asset_path)) {
      throw new Error(
         'You need to run `npm start` or `npm run build` for the "mmoollllee/buttons" block first.'
      );
   }
   $index_js = 'build/index.js';
   $script_asset = require $script_asset_path;
   wp_register_script(
      'mmoollllee-buttons-block-editor',
      $path . "/blocks/{$slug}/{$index_js}",
      $script_asset['dependencies'],
      $script_asset['version']
   );
   wp_set_script_translations('mmoollllee-buttons-block-editor', 'buttons');

   $editor_css = 'build/index.css';
   wp_register_style(
      'mmoollllee-buttons-block-editor',
      $path . "/blocks/{$slug}/{$editor_css}",
      [],
      filemtime("$dir/$editor_css")
   );

   $style_css = 'build/style-index.css';
   wp_register_style(
      'mmoollllee-buttons-block',
      $path . "/blocks/{$slug}/{$style_css}",
      [],
      filemtime("$dir/$style_css")
   );

   register_block_type('mmoollllee/buttons', [
      'editor_script' => 'mmoollllee-buttons-block-editor',
      'editor_style' => 'mmoollllee-buttons-block-editor',
      'style' => 'mmoollllee-buttons-block',
   ]);
});
