<?php
   $ids = get_sub_field('element');

	$layout = get_sub_field("layout");

	$layout_map = [
      'mansory-filter' => 'col-12 row'
	];
	$layout_classes = [];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
	}

?>

<div class="<?php the_classes(['element container', ...$layout_classes ]); ?>">

   <?php if (in_array('has-title', $layout)) : ?>
      <h3><!--title--></h3>
   <?php endif; ?>

   <?php
      if (in_array('projekte', $layout)):
         require_once(get_template_directory() . '/projekte/element.php');
      elseif (in_array('team', $layout)):
         require_once(get_template_directory() . '/team/element.php');
      else: 
   ?>
   <?php
      foreach($ids as $id) {
         $post_type = get_post_type($id);

         if ($post_type == "stories") {
            global $post; 
            $post = get_post( $id, OBJECT );
            setup_postdata( $post );
            get_template_part('stories/template');
            wp_reset_postdata();
         } else {
            builder(['post_id' => $id]);
         }
      }
   ?>
   <?php endif; ?>
</div>

