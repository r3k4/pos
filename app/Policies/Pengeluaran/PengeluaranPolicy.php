<?php

namespace App\Policies\Pengeluaran;

use App\Models\Mst\Pengeluaran;
use App\Models\Mst\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengeluaranPolicy
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


    public function updatePengeluaran(User $user, Pengeluaran $pengeluaran)
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return true;
        }
        return $user->id === $pengeluaran->mst_user_id;
    }


    public function destroyPengeluaran(User $user, Pengeluaran $pengeluaran)
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return true;
        }
        return $user->id === $pengeluaran->mst_user_id;        
    }


}
