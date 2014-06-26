<?php
/**
 * The main template file.
 *
 * This theme is purely for the purpose of testing theme options in Options Framework plugin.
 *
 * @package WordPress
 * @subpackage Options Framework Theme
 */

get_header();

while(have_posts()) { 
    the_post();
    get_template_part('content/page');
}

get_footer();