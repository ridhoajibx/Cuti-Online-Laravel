<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $hidden = ['created_at','updated_at',];

    public function User()
    {
      return $this->hasOne('App\Models\User');
    }
}
