<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table= 'cabang';
    protected $guarded = [];
    public function ranting()
    {
        // return $this->belongsToMany('App\Ranting', 'cabang_ranting', 'cabang_id', 'ranting_id');
        // return $this->belongsTo('App\Ranting', 'ranting_id', 'id');
        return $this->hasMany('App\Ranting');
    }
    public function anggota()
    {
        return $this->hasMany('App\Anggota');
    }
}
