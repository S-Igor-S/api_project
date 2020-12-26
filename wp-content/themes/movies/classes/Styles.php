<?php
//Подклюение CSS + JS
class Styles 
{

    private function load_styles()
    {
        //$ver = filemtime( get_template_directory().'/assets/css/style.css';
        return wp_enqueue_style($handle = 'custom-css', $src = get_template_directory_uri().'/assets/css/style.css');
    }

    public function init()
    {
        add_action('wp_enqueue_scripts', function () {
            $this->load_styles();
        });
    }

}
?>