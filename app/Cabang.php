<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table= 'cabang';
    protected $guarded = [];
    public function ranting()
    {
        return $this->hasMany('App\Ranting');
    }
    public function anggota()
    {
        return $this->hasMany('App\Anggota', 'id', 'anggota_id');
    }
}
