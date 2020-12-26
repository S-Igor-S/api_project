<?php
class Shortcodes
{
    //Шорткод для вывода фильмов
    private function wp_show_movies_shortcode()
    {
        while(have_posts())
        {
            the_post();
            the_title("<h2>", "</h2>");
            the_content();
            wp_link_pages();
            ?>
            
            <?php
        }
    }
    public function init()
    {
        add_shortcode('show_movies_shortcode', function() {
            $this->wp_show_movies_shortcode();
        });
    }

    
}
?>