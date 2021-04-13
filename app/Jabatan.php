<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table= 'jabatan';
    protected $guarded = [];

    public function anggota()
    {
        return $this->hasOne('App\Jabatan');
    }
}
