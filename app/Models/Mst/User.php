<?php

namespace App\Models\Mst;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'mst_users';
    protected $fillable = [
        'nama', 'email', 'password', 'ref_user_level_id', 'mst_cabang_id'
    ];
    protected $appends = [
        'fk__ref_user_level', 'fk__mst_cabang'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFkMstCabangAttribute()
    {
        $c_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
        $c = $c_obj->find($this->attributes['mst_cabang_id']);
        if(count($c)>0){
            if($this->attributes['ref_user_level_id'] == 1){
                // jika admin, maka cabang tdk dimunculkan
                return null;
            }else{
                return $c->nama;                
            }
        }
        return null;
    }


    public function getFkRefUserLevelAttribute()
    {
        $l_obj = app('App\Repositories\Contracts\Ref\UserLevelRepoInterface');
        $l = $l_obj->find($this->attributes['ref_user_level_id']);
        if(count($l)>0){
            return $l->nama;
        }
    }


    public function setPasswordAttribute($value)
    {
    	return $this->attributes['password'] = bcrypt($value);
    }

    
}
