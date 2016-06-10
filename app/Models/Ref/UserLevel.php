<?php

namespace App\Models\Ref;

use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'ref_user_level';
    protected $fillable = ['nama'];

    public function mst_user()
    {
    	return $this->hasMany(User::class, 'ref_user_level_id');
    }

    
}
