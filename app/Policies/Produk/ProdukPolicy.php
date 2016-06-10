<?php

namespace App\Policies\Produk;

use App\Models\Mst\Produk;
use App\Models\Mst\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdukPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateProduk(User $user, Produk $post)
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return true;
        }
        return $user->id === $post->mst_user_id;
    }


    public function destroyProduk(User $user, Produk $post)
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return true;
        }
        return $user->id === $post->mst_user_id;        
    }


}
