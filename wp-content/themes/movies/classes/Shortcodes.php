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
        while(have_posts())
        {
            the_post();
            the_title("<h2 class='post_title'><a href=".get_permalink().">", "</a></h2>");
            wp_link_pages();
            $metaboxes = get_post_custom(get_the_id());
            print_r("<img src={$metaboxes['_poster'][0]} alt='No poster'>");
            ?>
            
            <?php
        }
    }

    public function wp_show_single_movie_shortcode()
    {
        while(have_posts())
        {
            the_post();
            the_title("<h2 class='post_title'><a href=".get_permalink().">", "</a></h2>");
            wp_link_pages();
            $metaboxes = get_post_custom(get_the_id());
            print_r("<img src={$metaboxes['_poster'][0]} alt='No poster'>");
            the_content();
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
                <p><strong><?=$key?></strong>: <?=$value[0]?></p>
                <?php
            }
            ?>
            
            <?php
        }
    }

}
?>