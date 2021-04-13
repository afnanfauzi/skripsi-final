<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table= 'artikel';
    protected $casts = ['created_at' => 'datetime:d-m-Y',];
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
      
    }

    public function anggota()
    {
        return $this->belongsTo('App\Anggota', 'anggota_id', 'id');
      
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags', 'artikel_tags', 'artikel_id', 'tags_id');
    }

    public function status(){
        return $this->belongsTo('App\StatusPublikasi', 'statuspublikasi_id', 'id');
    }
}
