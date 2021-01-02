<?php
ini_set ('max_execution_time', '300');
//Classes

require_once 'classes/Styles.php';
require_once 'classes/PostMovies.php';
require_once 'classes/Shortcodes.php';
require_once 'classes/AddMetaBoxes.php';

//Подключение стилей

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

//Добавляем фильмы
// !Подключать только для загрузки фильмов в базу данных, после закомментировать
require_once 'classes/AddMovies.php';

$addMovies = new AddMovies();
$addMovies->init();
?>