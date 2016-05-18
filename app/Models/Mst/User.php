<?php

namespace App\Models\Mst;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'mst_users';
    protected $fillable = [
        'nama', 'email', 'password', 'ref_user_level_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
