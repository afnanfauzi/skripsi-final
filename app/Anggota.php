<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table= 'anggota';
    protected $fillable = ['id','nama_anggota','no_telp','alamat','gambar','unit_id','akun_id', 'jabatan_id','jenkel', 'tgl_lahir'];


    public function units()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }

    public function berita()
    {
        return $this->belongsTo('App\Berita');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }
    
}
