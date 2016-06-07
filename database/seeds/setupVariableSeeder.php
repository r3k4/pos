<?php

use App\Models\SetupVariable;
use Illuminate\Database\Seeder;

class setupVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// nama aplikasi
        $sv = SetupVariable::where('variable', '=', 'nama_aplikasi')->first();
        if(count($sv)<=0){
        	$data = ['variable' => 'nama_aplikasi', 'value' => 'TKASIR'];
        	SetupVariable::create($data);
        }
 
        // config backup
        $sv = SetupVariable::where('variable', '=', 'backup_db')->first();
        if(count($sv)<=0){
            $data = ['variable' => 'backup_db', 'value' => '1']; // 1/0
            SetupVariable::create($data);
        }
 


    }
}
