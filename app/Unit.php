<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table= 'unit';
    protected $guarded = [];

    public function kegiatans()
    {
        return $this->hasMany('App\Kegiatan');
    }
    public function anggota()
    {
        return $this->hasMany('App\Anggota');
    }
}
