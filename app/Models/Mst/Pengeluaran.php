<?php

namespace App\Models\Mst;

use App\Models\Mst\Cabang;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'mst_pengeluaran';
    protected $fillable = ['nama', 'jumlah', 'biaya', 'subtotal_biaya', 
    					   'tgl_pengeluaran', 'keterangan', 'mst_user_id', 
    					   'mst_cabang_id'
    					  ];
    protected $appends = [
        'fk__mst_user'
    ];

    public function getFkMstUserAttribute()
    {
        $u_obj = app('App\Repositories\Contracts\Mst\UserRepoInterface');
        $u = $u_obj->find($this->attributes['mst_user_id']);
        if(count($u)>0){
            return $u->nama;
        }
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }

    

}
