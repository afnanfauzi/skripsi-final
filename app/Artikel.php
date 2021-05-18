<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Artikel extends Model
{
    protected $table= 'artikel';
    protected $guarded = [];


    // convert waktu
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->locale('id')->isoFormat('LL');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
      
    }

    public function anggota()
    {
        return $this->belongsTo('App\Anggota', 'anggota_id', 'id');
      
    }

    public function label()
    {
        return $this->belongsToMany('App\Label', 'artikel_label', 'artikel_id', 'label_id');
    }

    public function status(){
        return $this->belongsTo('App\StatusPublikasi', 'statuspublikasi_id', 'id');
    }
}
