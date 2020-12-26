<?php
Class PostMovies
{

    private function register_post_movies()
    {
        $labels = array(
            'name' => _x( 'Movies', 'post type general name' ),
            'singular_name' => _x( 'Movie', 'post type singular name' ),
        );
        $args = array( 
            'labels' => $labels,
            'description' => 'Movies post',
            'public' => true,
            'has_archive' => true,
        );
        return register_post_type('Movies', $args);
    }

    public function init()
    {
        add_action( 'init', function() {
            $this->register_post_movies();
        } );
    }
    
}
?>