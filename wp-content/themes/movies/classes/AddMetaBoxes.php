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

    private function add_new_metabox()
    {
        add_meta_box(
            $this->id,
            $this->title,
            [$this, 'html'],
            $this->screen,
        );
    }

    private function render_metabox($post)
    {
        $post_meta = get_post_meta($post->ID, $this->id, true);
        ?>
        <label for=<?=$this->id?>></label>
        <input type='text' name=<?=$this->id?>>
        <?php
    }

    private function save_metabox($post_id)
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