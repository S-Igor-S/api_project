<?php
class AddMovies
{
    
    public function add_movies()
    {
        for($page = 1; $page < 5; $page++)
        {
            $url = "http://ec2-18-219-233-220.us-east-2.compute.amazonaws.com/wpr/index.php/wp-json/wl/v1/movies?page=".$page;
            $response = wp_remote_get( $url );
            $movies = json_decode( wp_remote_retrieve_body( $response ), true );
            foreach ($movies as $movie) {
                $post = array(
                    'post_content' => "<img src='{$movie['poster_path']}' alt='poster'><p>{$movie['overview']}</p>",
                    'post_title' => $movie['title'],
                    'post_status' => 'publish',
                    'post_type' => 'movies',
                    '',

                );
                $my_post_id = wp_insert_post( $post);
            }
        }
    }

}

?>