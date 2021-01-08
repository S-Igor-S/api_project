<?php
class ApiRequest
{

    private $post_array;

    public function __construct ($post_array)
    {
        $this->post_array = $post_array;
    }
         
    public function send_request()
    {
         $api_response = wp_remote_post($url = 'http://movie-world.top/wp-json/wp/v2/movie', array(
            'headers' => array(
               'Authorization' => 'Basic '.get_option('api_key'),
           ),
           'body' => $this->request_body(),
        ));
    }

    private function request_body()
    {
        $body = [];
        foreach($this->post_array as $key => $value)
        {
            if($key == 'genres' && gettype($value) == 'array')
            {
                $value = implode(', ', $value);
            }
            $body = array_merge($body, [$key => $value]);
        }
        $body = array_merge($body, ['status' => 'pending']);
        $body = array_merge($body, ['slug' => sanitize_title($body['original_title'])]);
        return $body;
    }

}
?>