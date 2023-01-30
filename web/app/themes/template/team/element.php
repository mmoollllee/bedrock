<?php
   $loop = new WP_Query([
      'post_type' => 'team',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
   ]);
?>
<div class="row">
<?php
   while ($loop->have_posts()):
      $loop->the_post();
      $name = get_the_slug();
      $bild = get_field('bild');
      $vita = get_field('vita');
?>
   <div class="col-12 col-s-6 col-m-4 col-l item">
      <figure class="thumbnail">
      <?php if (!empty($bild)): ?>
         <img loading="lazy" <?= acf_responsive_image($bild['ID'], 'medium') ?> />
      <?php endif; ?>
      </figure>
      <span><?php the_title(); ?></span><br />
      <small class="d-block untertitel"><?php the_field('untertitel'); ?></small>
      
      <?php if (!empty($vita)): ?>
      <button data-fancybox data-src="#vita<?= $name ?>">Vita</button>
      <div id="vita<?= $name ?>" style="display: none;">
         <h2><?php the_title(); ?></h2>
         <p class="untertitel"><?php the_field('untertitel'); ?></p>
         <?php the_field('vita'); ?>
      </div>
      <?php endif; ?>
   </div>
<?php
   endwhile;
   wp_reset_query();
?>
</div>
