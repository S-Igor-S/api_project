<?php

class Shortcodes
{

    public function init()
    {
        add_shortcode('show_movies_archive_shortcode', [$this, 'wp_show_movies_archive_shortcode']);

        add_shortcode('show_single_movie_shortcode', [$this, 'wp_show_single_movie_shortcode']);

        add_shortcode('sort_movies_shortcode', [$this, 'wp_sort_movies_shortcode']);

        add_shortcode('add_movies_shortcode', [$this, 'wp_add_movies_shortcode']);
    }

    //Show archive of movies

    public function wp_show_movies_archive_shortcode()
    {

        print_r("<div class='mw-theme-movies-archive-page'>");

        while(have_posts())
        {

            print_r("<div class='mw-theme-movies-post-place'>");

            the_post();
            
            the_title("<h2 class='mw-theme-movies-title'><a href=".get_permalink().">", "</a></h2>");
            wp_link_pages();
            $metaboxes = get_post_custom(get_the_id());
            ?>
            
            <div class='mw-theme-movies-logo'>
                <img src=<?=$metaboxes['_poster'][0]?> alt='No poster' width='330' height='530'>
            </div>

            <?php

            print_r("</div>");
            
        }

        print_r("</div>");

    }
  
    //Show single movie


    public function wp_show_single_movie_shortcode()
    {

        print_r("<div class='mw-theme-movie-details-page'>");

        while(have_posts())
        {
            the_post();
            the_title("<h2 class='mw-theme-movie-title'>", "</h2>");

            $metaboxes = get_post_custom(get_the_id());
            ?>
            
            <div class='mw-theme-movie-logo-column'>
                <img src=<?=$metaboxes['_poster'][0]?> alt='No poster'>
            </div>

            <?php

            print_r("<div class='mw-theme-movie-details-column'>");

            foreach($metaboxes as $key => $value)
            {
                if($key[0] == '_')
                {
                    continue;
                }else
                {
                    $key = ucfirst(str_replace('_', ' ', $key));
                }
                ?>

                <span class='mw-theme-movie-desc-headers'><?=$key?>:</span> <span class='mw-theme-movie-desc'><?=$value[0]?></span>
                <br>

                <?php
            }
            
            print_r("</div>");
            
            print_r("<div class='mw-theme-movie-overview-column'>");

            the_content();

            print_r("</div>");

        }

        print_r("</div>");


    }

    //Shortcode for creating POST request to API

    public function wp_add_movies_shortcode()
    {
        ?>

        <form method='POST'>
            <p>Название фильма:<br><input type='text' name='title' required size=100></p>
            <p>Оригинальное название фильма:<br><input type='text' name='original_title' required  size=100>
            <p>Описание:<br> <input type='text' name='overview' size=100></p>
            <p>Жанры:<br> <select name='genres[]' multiple>
                <option value='боевик'>Боевик</option>
                <option value='комедия'>Комедия</option>
                <option value='приключения'>Приключения</option>
                <option value='драма'>Драма</option>
                <option value='триллер'>Триллер</option>
                <option value='мультфильм'>Мультфильм</option>
                <option value='фэнтези'>Фэнтези</option>
                <option value='семейный'>Семейный</option>
                <option value='фантастика'>Фантастика</option>
                <option value='ужасы'>Ужасы</option>
                <option value='мелодрама'>Мелодрама</option>
                <option value='криминал'>Криминал</option>
                <option value='детектив'>Детектив</option>
                <option value='военный'>Военный</option>
                <option value='музыка'>Музыка</option>
                <option value='история'>История</option>
                <option value='документальный'>Документальный</option>
                <option value='вестерн'>Вестерн</option>
            </select> </p>
            <p>Ссылка на постер:<br><input type='text' name='poster_path' size=100></p>
            <p>Длительность:<br> <input type='text' name='runtime' size=100></p>
            <p>Дата релиза:<br> <input type='date' name='release_date' size=100></p>
            <p>Производитель:<br> <input type='text' name='production_countries' size=100></p>
            <p>Бюджет:<br> <input type='text' name='budget' size=100></p>
            <p>Кассовые сборы:<br> <input type='text' name='revenue' size=100></p>
            <p><input type='submit' name='submit' value='Отправить'></p>
        </form>

        <?php

    }

}
?>