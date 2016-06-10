<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetupVariable extends Model
{
    protected $table = 'setup_variable';
    protected $fillable = ['value', 'variable', 'keterangan'];
}
