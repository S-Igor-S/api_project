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
    $cron_processes = get_option( 'cron' );

    var_dump( $cron_processes );
    echo "<br>";
    print_r(time());
    ?>
</div>
<?php get_footer()?>