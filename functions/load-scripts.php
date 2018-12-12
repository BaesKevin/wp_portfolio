<?php
/**
 * Proper way to enqueue scripts and styles
 */

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), time() );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.min.css', array(), time()  );
    wp_enqueue_style( 'line-icons', get_template_directory_uri() . '/css/line-icons.min.css', array(), time()  );
    wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/css/elegant-icons.min.css', array(), time()  );
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.min.css', array(), time()  );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), time()  );
    wp_enqueue_style( 'theme-1', get_template_directory_uri() . '/css/theme-1.css', array(), time()  );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), time()  );
    
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'spectragram', get_template_directory_uri() . '/js/spectragram.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scrollReveal', get_template_directory_uri() . '/js/scrollReveal.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'twitterFetcher_v10_min', get_template_directory_uri() . '/js/twitterFetcher_v10_min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );