<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->customHelpers();

        // bind data master
        $this->dataMaster();

        // bind data referensi
        $this->dataReferensi();
    }

    private function customHelpers()
    {
        $this->app->bind('App\Repositories\Contracts\SetupVariableRepoInterface', 
                'App\Repositories\Eloquent\SetupVariableRepo');

        $this->app->bind('fungsi', 
                'App\Helpers\Fungsi');        
    }


    private function dataMaster()
    {
        // data master
        $this->app->bind('App\Repositories\Contracts\Mst\UserRepoInterface',
            'App\Repositories\Eloquent\Mst\UserRepo');

        $this->app->bind('App\Repositories\Contracts\Mst\ProdukRepoInterface',
            'App\Repositories\Eloquent\Mst\ProdukRepo');


        $this->app->bind('App\Repositories\Contracts\Mst\CabangRepoInterface',
            'App\Repositories\Eloquent\Mst\CabangRepo');

        $this->app->bind('App\Repositories\Contracts\Mst\HistoryStokRepoInterface',
            'App\Repositories\Eloquent\Mst\HistoryStokRepo');

        $this->app->bind('App\Repositories\Contracts\Mst\PengeluaranRepoInterface',
            'App\Repositories\Eloquent\Mst\PengeluaranRepo');

        $this->app->bind('App\Repositories\Contracts\Mst\PenjualanRepoInterface',
            'App\Repositories\Eloquent\Mst\PenjualanRepo');     

        $this->app->bind('App\Repositories\Contracts\Mst\TransaksiRepoInterface',
            'App\Repositories\Eloquent\Mst\TransaksiRepo');     

               
    }




    private function dataReferensi()
    {
        
        $this->app->bind('App\Repositories\Contracts\Ref\UserLevelRepoInterface',
            'App\Repositories\Eloquent\Ref\UserLevelRepo');      
        
        $this->app->bind('App\Repositories\Contracts\Ref\ProdukRepoInterface',
            'App\Repositories\Eloquent\Ref\ProdukRepo');         

        $this->app->bind('App\Repositories\Contracts\Ref\SatuanProdukRepoInterface',
            'App\Repositories\Eloquent\Ref\SatuanProdukRepo');       

    }
}
