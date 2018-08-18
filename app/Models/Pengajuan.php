<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $hidden = ['created_at','updated_at',];

    public function pemohon()
    {
      return $this->belongsTo('App\Models\User', 'pemohon_id');
    }

    public function penyetuju()
    {
      return $this->belongsTo('App\Models\User', 'penyetuju_id');
    }

    public function jenis_cuti()
    {
      return $this->belongsTo('App\Models\JenisCuti', 'jenis_cuti_id');
    }
}
