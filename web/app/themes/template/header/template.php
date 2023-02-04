<?php
   $titel = get_field('titel') ?: get_the_title();
   $caption = get_field('caption');
   $einleitung = get_field('einleitung');
   $einleitung_aside = get_field('einleitung_aside');
   $einleitung_aside_text = get_field('einleitung_aside_text');
   $usps = get_field('usps');
   $bilder = get_field('bilder');
   $is_product = $post->post_parent == 100;
?>

<header class="container">
   <div class="row justify-content-between">
      <div class="col-12 col-sm-6 col-l-5">
         <?php if ($caption): ?>
            <span class="caption"><?= $caption ?></span>
         <?php endif; ?>
         <?php if (function_exists('breadcrumb_trail') && !is_home() && !is_front_page()): 
            breadcrumb_trail([
               'before' => false,
               'show_browse' => false,
               'labels' => ['error_404' => 'Fehler 404', 'paged' => 'Seite %s'],
            ]);
         endif; ?>
         <h2><?= $titel ?></h2>
      </div>
      <div class="col col-l-5 mb-n4 align-self-end">
         <?= $einleitung; ?>
      </div>
   </div>
</header>