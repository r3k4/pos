<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'ref_produk';
    protected $fillable = ['nama', 'kode_warna'];
}
