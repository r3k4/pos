<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserLevelSeeder::class);
        $this->call(SatuanProdukSeeder::class);
        $this->call(setupVariableSeeder::class);

        
    }
}
