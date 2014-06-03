<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Register site JS
wp_register_script('site.js', get_template_directory_uri() . '/js/site.js', array('jquery'));
wp_register_style('site.css', get_template_directory_uri() . '/css/site.css');