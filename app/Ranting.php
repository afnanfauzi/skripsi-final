<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $table= 'ranting';
    protected $guarded = [];
    public function cabang()
    {
    return $this->belongsTo('App\Cabang', 'cabang_id', 'id');
    }
}
