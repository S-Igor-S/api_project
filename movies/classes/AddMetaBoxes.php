<?php
class AddMetaBoxes
{

    private $id;
    private $title;
    private $screen;
    private $html;

    public function __construct( $id, $title, $screen, $html = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->screen = $screen;
        $this->html = $html;
        add_action('add_meta_boxes', [$this, 'add_new_metabox']);
        
        add_action('save_post', [$this, 'save_metabox']);
    }

    public function add_new_metabox()
    {
        add_meta_box(
            $this->id,
            $this->title,
            [$this, 'render_metabox'],
            $this->screen,
        );
    }

    public function render_metabox($post)
    {
        $post_meta = get_post_meta($post->ID, $this->id, true);
        if(!isset($this->html))
        {
            ?>
            <input type='text' name=<?=$this->id?> value=<?=$post_meta?>>
            <?php
        } else 
        {
            print_r($html);
        }

    }

    public function save_metabox($post_id)
    {
        if ( array_key_exists($this->id, $_POST ) ) {
            update_post_meta(
                $post_id,
                $this->id,
                $_POST[$this->id],
            );
        }
    }
}
?>