<?php

//Config file

require_once 'config.php';

//Classes

require_once CLASSES_PATH.'Styles.php';
require_once CLASSES_PATH.'PostMovies.php';
require_once CLASSES_PATH.'Shortcodes.php';
require_once CLASSES_PATH.'AddMetaBoxes.php';
require_once CLASSES_PATH.'CronProcesses.php';
require_once CLASSES_PATH.'ApiCredits.php';


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


//Add cron processes (add movies)

$cronProcesses = new CronProcesses;
$cronProcesses->activate_cron();

//Add option page

$apiCredits = new ApiCredits;
$apiCredits->init();


add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'nav-menu' => __( 'Nav Menu' ),
        )
    );
}

?>