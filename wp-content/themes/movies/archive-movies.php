<?php get_header() ?>
<span class='posts_pagination'><?php the_posts_pagination($args = array(
    'screen_reader_text' => __('Pages'),
)) ?></span>
<?php do_shortcode('[show_movies_archive_shortcode]') ?>
<span class='posts_pagination'><?php the_posts_pagination($args = array(
    'screen_reader_text' => __('Pages'),
)) ?></span>
<?php get_footer() ?>