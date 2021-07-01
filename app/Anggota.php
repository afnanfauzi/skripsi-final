<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Anggota extends Model
{
    protected $table= 'anggota';
    protected $guarded = [];
    // protected $casts = ['tgl_lahir' => 'datetime:d-m-Y',];

     // convert waktu
    //  public function getCreatedAtAttribute()
    //  {
    //      return Carbon::parse($this->attributes['tgl_lahir'])
    //      ->locale('id')->isoFormat('LLL');
    //  }


    public function units()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }

    // public function berita()
    // {
    //     return $this->belongsTo('App\Berita');
    // }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }
    public function cabang()
    {
        return $this->belongsTo('App\Cabang', 'cabang_id');
    }
    public function ranting()
    {
        return $this->belongsTo('App\Ranting', 'ranting_id');
    }
    
}
