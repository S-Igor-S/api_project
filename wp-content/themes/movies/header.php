<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Movies</title>
</head>

<body>
<div class="wrapper">
    <?php wp_head(); ?>
    <header class="header grid">
        <h1>Movies</h1>
        <?php wp_nav_menu(
            array(
                'menu' => 'nav-menu',
                'theme_location' => 'nav-menu',
                'container' => 'nav', 
                'menu_class' => 'menu-main',
                'before' => '<div class"head_menu grid"><h2>',
                'after' => '</h2></div>',)            
        ); ?>
    </header>
</div>

