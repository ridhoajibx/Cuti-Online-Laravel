<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    protected $table = 'level_users';
    protected $hidden = ['created_at','updated_at',];

    public function User()
    {
      return $this->hasOne('App\Models\User');
    }
}
