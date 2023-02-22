<?php

$banner_active = get_field('notification-banner-active', 'options');
$banner_icon = get_field('notification-banner-icon', 'options');
$banner_text = get_field('notification-banner-text', 'options');
$banner_link = get_field('notification-banner-url', 'options');
$banner_layout = get_field("notification-layout", 'options');
if ($banner_active):
?>

<div id="notification" class="<?= (in_array('bg-dark', $banner_layout)) ? ' dark' : ''; ?> pt-1">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <figure class="col-auto">
            <?php if (str_contains($banner_icon['mime_type'], 'svg')): ?>
               <?= file_get_contents(get_attached_file($banner_icon['id'])); ?>
            <?php else: ?>
               <img <?= acf_responsive_image($banner_icon['id'], 'thumbnail') ?> />
            <?php endif; ?>
         </figure>
         <div class="col col-sm-auto my-2">
            <p><?= $banner_text ?> <?php if ($banner_link && !in_array('button', $banner_layout)) { ?> <a href="<?= $banner_link['url'] ?>" title="<?= $banner_link['title'] ?>"><?= $banner_link['title'] ?></a><?php } ?></p>
         </div>
         <?php if ($banner_link && in_array('button', $banner_layout)): ?>
            <div class="col-12 text-center col-sm-auto">
               <a href="<?= $banner_link['url'] ?>" title="<?= $banner_link['title'] ?>" class="button button-small"><?= $banner_link['title'] ?></a>
            </div>
         <?php endif; ?>
      </div>
   </div>
</div>

<?php endif; ?>
