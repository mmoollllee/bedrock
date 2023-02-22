<?php

add_action('after_setup_theme', function () {
   add_theme_support('align-wide');
   add_theme_support('editor-styles');
   add_editor_style('css/editor.css');
});
