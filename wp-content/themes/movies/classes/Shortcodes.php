<?php
class Shortcodes
{

    public function init()
    {
        add_shortcode('show_movies_archive_shortcode', [$this, 'wp_show_movies_archive_shortcode']);

        add_shortcode('show_single_movie_shortcode', [$this, 'wp_show_single_movie_shortcode']);
    }

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

}
?>