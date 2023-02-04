<?php

require_once 'builder/setup.php';

function autoload($path) {
   $items = glob($path . DIRECTORY_SEPARATOR . '*');

   foreach ($items as $item) {
      if (is_file($item) && pathinfo($item)['extension'] === 'php') {
         require_once $item;
      } elseif (is_dir($item)) {
         autoload($item);
      }
   }
}
autoload(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions');

// Setup Post-Types
require_once 'header/setup.php';
require_once 'referenzen/setup.php';
require_once 'team/setup.php';

// Enqueue Scripts & CSS
require_once 'src/enqueue.php';

// Setup Favicons
require_once 'favicons/setup.php';
