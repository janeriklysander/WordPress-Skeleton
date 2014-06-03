<?php
/**
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"> -->
    <title><?php wp_title(); ?></title>
    <?php 
    wp_enqueue_style('site.css');
    wp_enqueue_script('site.js');
    wp_head(); 
    ?>
</head>

<body <?php body_class(); ?>>

	<div id="page">
        <header>
            <div class="wrapper">
                <div class="container">
                    
                </div>
            </div>
        </header>
        <div role="main">
            <div class="wrapper">
                <div class="container">