<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPublikasi extends Model
{
    protected $table= 'statuspublikasi';
    protected $guarded = [];
    public function artikel(){
        return $this->hasOne(StatusPublikasi::class);
    }
}
