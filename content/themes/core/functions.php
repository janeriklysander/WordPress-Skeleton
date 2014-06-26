<?php
/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
$root_dir = realpath(dirname(__FILE__).'/../../../');

if (!function_exists('of_get_option')) {
    function of_get_option($name, $default = false) {
        $optionsframework_settings = get_option('optionsframework');
        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];
        if (get_option($option_name)) {
            $options = get_option($option_name);
        }
        if (isset($options[$name])) {
            return $options[$name];
        } else {
            return $default;
        }
    }
}

// Create uploads directory if it doesn't exist
mkdir($root_dir.'/shared/content/uploads', 0777, true);

// Register site JS
wp_register_script('site.js', get_template_directory_uri() . '/js/site.js', array('jquery'));

// Register site CSS
wp_register_style('site.css', get_template_directory_uri() . '/css/site.css');