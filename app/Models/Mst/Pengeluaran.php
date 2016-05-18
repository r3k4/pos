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

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }

    

}
