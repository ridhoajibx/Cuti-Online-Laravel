<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKaryawan extends Model
{
    protected $table = 'status_karyawans';
    protected $hidden = ['created_at','updated_at',];

    public function User()
    {
      return $this->hasOne('App\Models\User');
    }

}
