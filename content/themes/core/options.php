<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$categories = array();
	foreach (get_categories() as $category) {
		$categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$tags = array();
	foreach (get_tags() as $tag ) {
		$tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$pages = array();
	$pages[''] = __('Select a page:', 'options_framework_theme');
	foreach (get_pages('sort_column=post_parent,menu_order') as $page) {
		$pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array(
		array(
			'name' => __('Basic Settings', 'options_framework_theme'),
			'type' => 'heading'
		),
		array(
			'name' => __('Google Analytics tracking code', 'options_framework_theme'),
			'desc' => __('A mini text input field.', 'options_framework_theme'),
			'id' => 'google_analytics',
			'std' => '',
			'type' => 'textarea'
		),
	);

	return $options;
}