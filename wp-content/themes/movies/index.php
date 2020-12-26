<?php get_header() ?>
<?php get_sidebar() ?>
<div class = 'container'>
    <main>
        <?php
        while ( have_posts() ){
            the_post(); 
        }
        ?>
    </main>
    
    <?php
    // $query = new WP_Query( array( 
    //     'developer_taxonomy' => 'CD PROJEKT RED',
    //     'post_type' => 'games',
    //     ) );
    // $posts = new WP_Query( array( 
    //     'meta_key' => 'game_genre', 
    //     'meta_value' => 'Adventure', 
    //     'post_type' => 'games',
    //     ) );
    //     while ($posts->have_posts() ) {
    //         $posts->the_post();
        
    //         the_title(); // выведем заголовок поста
    //     }
    ?>
</div>
<?php get_footer() ?>