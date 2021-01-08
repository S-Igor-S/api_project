<?php
//Подклюение CSS + JS
class Styles 
{

    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'load_styles']);
    }

    public function load_styles()
    {
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.0.min.js');
        wp_enqueue_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-1.2.1.min.js');

        wp_enqueue_style($handle = 'style', $src = get_template_directory_uri() . '/style.css');

        wp_enqueue_style($handle = 'custom-single-movie-css', $src = get_template_directory_uri().'/assets/css/single_movie_styles.css');
        wp_enqueue_style($handle = 'custom-archive-movies-css', $src = get_template_directory_uri().'/assets/css/archive_movies_styles.css');
        wp_enqueue_style($handle = 'custom-archive-movies-css', $src = get_template_directory_uri().'/assets/css/styles.css');

        wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/slick/slick.css');
        wp_enqueue_style('slick-theme', get_template_directory_uri().'/assets/slick/slick-theme.css');
    
        wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/slick/slick.js');
    }

}
?>