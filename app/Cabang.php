<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table= 'cabang';
    protected $guarded = [];
    public function ranting()
    {
        return $this->belongsToMany('App\Ranting', 'cabang_ranting', 'cabang_id', 'ranting_id');
    }
}
