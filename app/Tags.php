<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table= 'tags';
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsToMany('App\Artikel', 'artikel_tags', 'tags_id', 'artikel_id');
    }
}
