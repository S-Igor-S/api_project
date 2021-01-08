<?php require CLASSES_PATH."SendMovies.php" ?>
<?php ob_start() ?>
<?php get_header() ?>
<?php
    
    do_shortcode('[add_movies_shortcode]');
   
    if(!empty($_REQUEST))
    {
        $apiRequest = new ApiRequest($_REQUEST);
        $apiRequest->send_request();
        header("Location: ".$_SERVER['REQUEST_URI']);
    }

?>
<?php get_footer() ?>
<?php ob_end_flush() ?>