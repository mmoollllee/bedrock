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

  <?php require(__DIR__ . '/parts/headernotification.php'); ?>

	<nav class="container">
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

   <header class="container pt-3" id="top-logo">
      <a class="d-block logo-l pb-3 ps-3" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
         <img class="" src="<?php the_field('logo', 'option' ); ?>" alt="<?php bloginfo('name'); ?>" />
      </a>
   </header>

	<main id="content">
		<div id="main" class="anchor"></div>

