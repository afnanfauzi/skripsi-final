<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table= 'label';
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsToMany('App\Artikel', 'artikel_label', 'label_id', 'artikel_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
