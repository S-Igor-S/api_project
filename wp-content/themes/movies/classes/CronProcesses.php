<?php
use classes\DownloadMovies;

require_once VENDOR_PATH.'Kama_Cron.php';

class CronProcesses
{
    public function activate_cron()
    {
        new Kama_Cron([
            'id' => 'cron_processes',
            'events' => array(
                'cron_add_movies' => array(
                    'callback' => [$this, 'cron_add_movies'],
                    'start_time' => time() + 30,
                    'interval_name' => 'every_day',
                    'interval_sec' => HOUR_IN_SECONDS * 24,
                    'interval_desc' => 'Каждый день',
                ),
            ),
        ]);
    }
    public function cron_add_movies()
    {
        $addMovies = new DownloadMovies();
        $addMovies->add_movies();
    }
}
?>