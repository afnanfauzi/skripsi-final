<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Halaman extends Model
{
    protected $table= 'halaman';
    protected $guarded = [];

    // convert waktu
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->locale('id')->isoFormat('LL');
    }

    
}
