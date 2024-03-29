<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table= 'kategori';
    protected $guarded = [];

    public function artikel()
    {
        return $this->hasMany('App\Artikel');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    

}
