<?php
   $loop = new WP_Query([
      'post_type' => 'team',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
   ]);
?>
<div class="row col-l-8 justify-content-center team mb-4">
<?php
   while ($loop->have_posts()):
      $loop->the_post();
      $name = get_the_slug();
      $bild = get_field('bild');
      $vita = get_field('vita');
?>
   <div class="col-12 col-s-6 col-m-5 mb-3">
      <figure class="portrait">
      <?php if (!empty($bild)): ?>
         <img loading="lazy" <?= acf_responsive_image($bild['ID'], 'medium') ?> />
      <?php endif; ?>
      </figure>
      <span><?php the_title(); ?></span>
      <small class="d-block untertitel"><?php the_field('untertitel'); ?></small>
      
   </div>
<?php
   endwhile;
   wp_reset_query();
?>
</div>
