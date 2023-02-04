<?php
$description = empty(get_field('meta_description'))
   ? get_field('meta_description', 'option')
   : get_field('meta_description');
$meta = !empty(get_field('meta_keywords'))
   ? get_field('meta_keywords')
   : get_field('meta_keywords', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?= get_field('noindex') === false || get_field('noindex', 'option') == false
    ? '<meta name="robots" content="noindex" />'
    : ''; ?>
	<meta name="description" content="<?= $description; ?>" />
	<meta name="keywords" content="<?= $meta; ?>" />

	<!--noptimize-->
	<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
	<!--/noptimize-->

	<?php wp_head(); ?>

	<?php the_field('head'); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">

   <?php

      $banner_active = get_field('notification-banner-active', 'options');
      $banner_icon = get_field('notification-banner-icon', 'options');
      $banner_text = get_field('notification-banner-text', 'options');
      $banner_link = get_field('notification-banner-url', 'options');
      $banner_layout = get_field("notification-layout", 'options');
      if ($banner_active):
   ?>

   <div id="notification" class="container<?= (in_array('bg-dark', $banner_layout)) ? ' dark' : ''; ?> pt-2">

         <div class="row justify-content-center">
            <figure class="col-auto">
               <?php if (str_contains($banner_icon['mime_type'], 'svg')): ?>
                  <?= file_get_contents(get_attached_file($banner_icon['id'])); ?>
               <?php else: ?>
                  <img <?= acf_responsive_image($banner_icon['id'], 'thumbnail') ?> />
               <?php endif; ?>
            </figure>
            <div class="col col-l-auto">
               <p><?= $banner_text ?></p>
            </div>
            <?php if ($banner_link): ?>
               <div class="col-12 text-center col-sm-auto align-self-start">
                  <a href="<?= $banner_link['url'] ?>" title="<?= $banner_link['title'] ?>" class="button button-small"><?= $banner_link['title'] ?></a>
               </div>
            <?php endif; ?>
         </div>

   </div>

   <?php endif; ?>

	<nav class="container pt-2">
  		<div class="row justify-content-end align-items-center">

			<?php wp_nav_menu([
            'theme_location' => 'top',
            'container' => false,
            'menu_class' => 'd-none d-m-flex col-auto menu',
            'depth' => 0,
         ]); ?>

			<button id="navtoggle" class="icon-bars col-auto text-right"></button>

  		</div>
	</nav>

   <header class="container" id="top-logo">
      <a class="d-block" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
         <img class="logo-l pb-2 ps-2" src="<?php the_field('logo', 'option' ); ?>" alt="<?php bloginfo('name'); ?>" />
      </a>
   </header>

	<main id="content">
		<div id="main" class="anchor"></div>

