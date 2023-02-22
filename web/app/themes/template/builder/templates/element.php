<?php
   $element_template = get_sub_field('element_template');
   $ids = get_sub_field('relationship');

	$layout = get_sub_field("layout");

	$layout_map = [
      'mansory-filter' => 'col-12 row'
	];
	$layout_classes = [];

	foreach ($layout as $value) {
		$layout_classes[] = array_key_exists($value, $layout_map) ? $layout_map[$value] : $value;
	}

?>


<?php 
// If no layout choosen just print the template
if (!$layout && $element_template) {
   require_once(get_template_directory() . '/'.$element_template.'/element.php');
}
return
?>

<div class="<?php the_classes(['element container', ...$layout_classes ]); ?>">

   <?php if (in_array('has-title', $layout)) : ?>
      <h3><!--title--></h3>
   <?php endif; ?>

   <?php
      if ($element_template):
         require_once(get_template_directory() . '/'.$element_template.'/element.php');
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
