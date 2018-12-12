<?php
// make the footer editable by making it a sidebar, WORDPRESS THINGS
register_sidebar( array(
    'name' => __( 'Footer information', 'portfolio' ),
    'id' => 'footer-information',
    'description' => __( 'Information for the footer', 'portfolio' ),
    'before_widget' => '<span class="text-white">',
    'after_widget' => '</span>'
) );
