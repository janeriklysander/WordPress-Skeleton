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
if (!is_dir($root_dir.'/shared/content/uploads'))
    mkdir($root_dir.'/shared/content/uploads', 0777, true);

// Register site JS
wp_register_script('site.js', get_template_directory_uri() . '/assets/js/site.js', array('jquery'));

// Register site CSS
wp_register_style('site.css', get_template_directory_uri() . '/assets/css/site.css');

// Include Google Analytics code
if($analytics_key = of_get_option('google_analytics')) {
    add_action('wp_head', function() use($analytics_key) {
        printf("<script type='text/javascript'>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '%s', 'auto');
        ga('send', 'pageview');

        </script>", $analytics_key);
    });
}