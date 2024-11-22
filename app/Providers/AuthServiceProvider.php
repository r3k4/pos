<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Mst\Produk' => 'App\Policies\Produk\ProdukPolicy',
        'App\Models\Mst\Pengeluaran' => 'App\Policies\Pengeluaran\PengeluaranPolicy',
    ];


    public function boot()
    {

        //
    }
}
