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
        wp_enqueue_style($handle = 'custom-single-movie-css', $src = get_template_directory_uri().'/assets/css/single_movie_style.css');
        wp_enqueue_style($handle = 'custom-archive-movies-css', $src = get_template_directory_uri().'/assets/css/archive_movies_style.css');
    }

}
?>