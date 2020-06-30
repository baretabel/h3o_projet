<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    //
    public function territoire(){
        return $this->belongsTo('App\Territoire');
    }
    public function localite(){
        return $this->hasMany('App\Localite');
    }
}
