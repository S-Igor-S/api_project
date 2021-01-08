<?php
class ApiCredits
{
    public function init()
    {
        add_action('admin_menu', array($this, 'api_credits'));
    }

    public function api_credits() {
        add_menu_page('API credits', 'API credits', 'update_themes', __FILE__, array($this, 'api_credits_page'));
    }
      
    public function api_credits_page() {
        add_option('api_key', 'QVBJIENsaWVudDo3b3NkIFRMa04gb016QyBsMGFOIEZpWlIgZENXSg==');
        ?>
        <form method=POST>
            <p>Текущий API key: <input type='text' name='api_key' value='<?=get_option('api_key')?>' size=100 disabled></input></p>
            <p>Новый API key: <input type='text' name='new_api_key' size=100 required></input></p>
            <input type='submit' value='Обновить'>
        </form>
        <?php
        if(!empty($_POST))
        {
            update_option('api_key', $_POST['new_api_key']);
        }
    }
}
?>