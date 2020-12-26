<?php
//Подключаем классы

require_once 'classes/Styles.php';
require_once 'classes/PostMovies.php';
require_once 'classes/AddMovies.php';

require_once 'classes/Shortcodes.php';

//Подключение класса стилей

$style = new Styles;
$style->init();

//Создание post type

$postMovie = new PostMovies;
$postMovie->init();

//Добавляем шорткоды

$shortcode = new Shortcodes;
$shortcode->init();

//Добавляем фильмы
//Подключать один раз

// $addMovies = new AddMovies;
// $addMovies->add_movies();
?>