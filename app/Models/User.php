<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function jabatan()
    {
      return $this->belongsTo('App\Models\Jabatan', 'jabatan_id');
    }

    public function user_level()
    {
      return $this->belongsTo('App\Models\LevelUser', 'user_level_id');
    }

    public function status_karyawan()
    {
      return $this->belongsTo('App\Models\StatusKaryawan', 'status_karyawan_id');
    }



    public function Pengajuan()
    {
      return $this->hasOne('App\Models\Pengajuan');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','created_at','updated_at'];

    }
