<?php
   $filter_terms = 'kategorie';
   $filters = get_terms(['taxonomy' => $filter_terms, 'hide_empty' => true]);
   $loop = new WP_Query([
      'post_type' => 'projekte',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
   ]);
?>
      <div class="col-12 row justify-content-around filters mt-4 mb-3">
         <?php foreach ($filters as $filter): ?>
         <button data-filter="<?= $filter->slug; ?>" class="col-auto"><i class="icon-arrow-right"></i> <?= $filter->name; ?></button>
         <?php endforeach; ?>
      </div>

      <div class="col-12 row pb-3 justify-content-center">
      <?php
         $count = 0;
         while ($loop->have_posts()):
            $loop->the_post();
            $count++;
            $bilder = get_field('bilder');
            $filters = get_the_terms(get_the_ID(), $filter_terms);
            $filter_names = '';
            foreach ($filters as $filter):
               $filter_names .= $filter->slug . '';
            endforeach;
      ?>
            <figure class="col-6 col-m-4 col-l-3 item <?= $filter_names; ?>">
               <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <?php
                     if ($bilder):
                        $image = $bilder[0];
                  ?>
                  <img loading="lazy" <?= acf_responsive_image($image['ID'], 'thumbnail') ?> />
                  <?php endif; ?>
               </a>
               <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block pt-1 font-90">
                  <?php the_title(); ?>
               </a>
            </figure>
      <?php
         endwhile;
         wp_reset_query();
      ?>
      </div>
      <?php if ($count >= 12): ?>
         <button class="button mx-auto col-auto icon-arrow-down more mb-4" style="display: none;">Mehr anzeigen</button>
      <?php endif; ?>