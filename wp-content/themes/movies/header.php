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
        <ul class = "head_menu grid">
            <?php
            wp_nav_menu( array(
                'menu'=>'head-menu-home',
                'menu_class'=>'menu',
                'theme_location'=>'top'
            ) );
            wp_nav_menu( array(
                'menu'=>'head-menu-all-mov',
                'menu_class'=>'menu',
                'theme_location'=>'top'
            ) );
            wp_nav_menu( array(
                'menu'=>'head-menu-send-mov',
                'menu_class'=>'menu',
                'theme_location'=>'top'
            ) );
            ?>
        </ul>

    </header>
</div>
