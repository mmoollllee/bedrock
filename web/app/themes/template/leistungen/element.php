<?php
   $loop = new WP_Query([
      'post_type' => 'leistungen',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
   ]);

   /*
   <div class="col-12 row justify-content-around filters mt-4 mb-3">
   <?php foreach ($filters as $filter): ?>
   <button data-filter="<?= $filter->slug; ?>" class="col-auto button"><?= $filter->name; ?></button>
   <?php endforeach; ?>
   </div>
   */

?>

      <div class="col-12 row pb-3 justify-content-center">
      <?php
         while ($loop->have_posts()):
            $loop->the_post();
            $bilder = get_field('bilder');
      ?>
            <figure class="col-6 col-m-4 col-l-3 leistung">
            <?php foreach ($bilder as $bild): ?>
               <a href="<?= $bild['sizes']['large'] ?>" title="<?php the_title(); ?>" data-fancybox="<?php the_ID(); ?>" data-caption="<?php the_field('beschreibung'); the_field('details'); ?>">
                  <img loading="lazy" <?= acf_responsive_image($bild['ID'], 'thumbnail') ?> alt="" />
               </a>
            <?php endforeach; ?>
            </figure>
      <?php
         endwhile;
         wp_reset_query();
      ?>
      </div>
      <?php if ($count >= 12): ?>
         <button class="button mx-auto col-auto icon-arrow-down more mb-4" style="display: none;">Mehr anzeigen</button>
      <?php endif; ?>
