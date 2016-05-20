<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class createAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_user:admin ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'menambahkan user admin via cli';

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
        $u_obj = app('App\Repositories\Contracts\Mst\UserRepoInterface');

        $nama = $this->ask('nama  ');
        $email = $this->ask('email ');
        $password = $this->secret('password  ');

        if($nama != '' && $email != null  && $password != null){
            $data = ['nama'   => $nama,
                    'email' => $email,
                    'password'  => $password,
                    'ref_user_level_id' => 1
                ];
                $u_obj->create($data);
                $this->info('data user admin telah berhasil ditambahkan...');
        }else{
            $this->error('isian data kurang lengkap!');
        }

    }
}
