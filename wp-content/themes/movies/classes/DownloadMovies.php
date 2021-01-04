<?php
namespace classes;

class DownloadMovies
{

    public function init()
    {
        add_shortcode('add_movies', [$this, 'add_movies']);
    }

    public function add_movies()
    {
        $movies = $this->download_movies();
        while(!empty($movies)) 
        {
            $movie = array_shift($movies);
            $post = array(
                'post_content' => "<p>{$movie['overview']}</p>",
                'post_title' => $movie['title'],
                'post_name' => $movie['original_title'],
                'post_status' => 'publish',
                'post_type' => 'movies',
                'meta_input' => [
                    'genres' => $movie['genres'],
                    'release_date' => $movie['release_date'],
                    'budget' => $movie['budget'],
                    'revenue' => $movie['revenue'],
                    'runtime' => $movie['runtime'],
                    'production_countries' => $movie['production_countries'],
                    '_original_id' => $movie['original_id'],
                    '_poster' => $movie['poster_path'],
                ],
            );
            
            if($this->duplication_check($movie['original_id']))
            {
                wp_delete_post($this->duplication_check($movie['original_id']), true);
            }
            wp_insert_post($post, true);
        }
    }

    //Download movies from API
    private function download_movies()
    {
        $movies = [];
        $max_page_number = $this->api_request()['max_page_number'];
        for($page = 1; $page <= $max_page_number; $page++)
        {
            $movies = array_merge($movies, $this->api_request($page)['result']); 
        }
        return $movies;
    }

    //Connect to API
    private function api_request($page = null)
    {
        $url = "http://ec2-18-219-233-220.us-east-2.compute.amazonaws.com/wpr/wp-json/mw/v1/movies?page=".$page;
        $response = wp_remote_get( $url );
        return json_decode( wp_remote_retrieve_body( $response ), true );
    }

    //Checking for duplicate in the database
    private function duplication_check($original_id)
    {
        global $wpdb;
        return $wpdb->get_var("SELECT post_id FROM wp_postmeta WHERE meta_key ='_original_id' AND meta_value =".$original_id);
    }

}

?>