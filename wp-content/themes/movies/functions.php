<?php

// CSS
wp_register_style( 'my_style', get_template_directory_uri() . '/style.css');
wp_enqueue_style( 'my_style');


//Config file

require_once 'config.php';

//Classes

require_once CLASSES_PATH.'Styles.php';
require_once CLASSES_PATH.'PostMovies.php';
require_once CLASSES_PATH.'Shortcodes.php';
require_once CLASSES_PATH.'AddMetaBoxes.php';
require_once CLASSES_PATH.'CronProcesses.php';

//CSS && JS

$style = new Styles;
$style->init();

//Create post type

$postMovie = new PostMovies;
$postMovie->init();

//Shortcodes

$shortcode = new Shortcodes;
$shortcode->init();

//Meta boxes

new AddMetaBoxes($id = 'genres', $title = 'Genres', $screen = 'movies');
new AddMetaBoxes($id = 'release_date', $title = 'Release date', $screen = 'movies');
new AddMetaBoxes($id = 'budget', $title = 'Budget', $screen = 'movies');
new AddMetaBoxes($id = 'revenue', $title = 'Revenue', $screen = 'movies');
new AddMetaBoxes($id = 'runtime', $title = 'Runtime', $screen = 'movies');
new AddMetaBoxes($id = 'production_countries', $title = 'Production countries', $screen = 'movies');

//Add Cron processes (add movies)

$cronJobs = new CronProcesses;
$cronJobs->activate_cron();


//Menu
register_nav_menus(array(
    'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));

?>