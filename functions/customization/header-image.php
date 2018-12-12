<?php

/*****************************************
CUSTOMIZATION API: custom top left logo
******************************************/

$args = array(
	'width'         => 200,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/img/logotype_dark.png',
);
add_theme_support( 'custom-header', $args );
