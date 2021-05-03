<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $table= 'ranting';
    protected $guarded = [];
    public function cabang()
    {
        // return $this->belongsTo('App\Cabang', 'cabang_id', 'id');
        // return $this->belongsToMany('App\Cabang', 'cabang_ranting', 'cabang_id', 'ranting_id');
        return $this->belongsTo('App\Cabang', 'cabang_id', 'id');
    
    }
    public function anggota()
    {
        return $this->hasMany('App\Anggota', 'id', 'anggota_id');
    }
}
