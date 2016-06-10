<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ifsnop\Mysqldump as IMysqldump;

class backupDbToDropbox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup_db:dropbox';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup database to dropbox account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

          $nama_file = 'dump_'.date('Y-m-d_H:i').'.sql';
            $full_path = storage_path('logs/'.$nama_file);

            $host = config('database.connections.mysql.host');
            $dbname = config('database.connections.mysql.database');
            $username = config('database.connections.mysql.username');
            $password = config('database.connections.mysql.password');            

        try {
            $dump = new IMysqldump\Mysqldump('mysql:host='.$host.';dbname='.$dbname, $username, $password);
            $dump->start($full_path);
            $src_file = fopen($full_path, "rb");
            \Dropbox::UploadFile('/'.$nama_file, \Dropbox\WriteMode::add(), $src_file);
            if(file_exists($full_path)){
                unlink($full_path);
            }
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }


    }
}
