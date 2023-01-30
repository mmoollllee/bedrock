<?php

$mg_vimeo = new StoutLogic\AcfBuilder\FieldsBuilder('mg_vimeo', [
   'title' => 'Vimeo',
   'style' => 'default', // or 'seamless'
]);
$mg_vimeo
   ->addText('vimeo_id', [
      'label' => 'Video URL',
      'instructions' => 'Bitte nur die ID des Videos eingeben.',
      'placeholder' => '370298388',
      'prepend' => 'https://vimeo.com/',
   ])

   ->setLocation('block', '==', 'acf/mg-vimeo');

add_action('acf/init', function () use ($mg_vimeo) {
   acf_add_local_field_group($mg_vimeo->build());
});

/**
 * Show iframe in Backend
 */
add_action('admin_head', function () {
   ?>
	<style>
		.vimeo:before {
			content: "Vimeo Video";
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			text-align: center;
			padding-top: 50px;
			background:
			#f1f1f1;
		}
	</style>
	<?php
});
