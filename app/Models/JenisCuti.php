<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    protected $table = 'jenis_cutis';
    protected $hidden = ['created_at','updated_at',];

    public function Pengajuan()
    {
      return $this->hasOne('App\Models\Pengajuan');
    }
}
