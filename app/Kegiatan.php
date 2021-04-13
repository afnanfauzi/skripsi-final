<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table= 'kegiatan';
    protected $guarded = [];

    public function units()
    {
    return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }

    
}
