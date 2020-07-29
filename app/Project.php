<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function ressource(){
        return $this->hasMany('App\Ressource');
    }
    public function fiche(){
        return $this->belongsTo('App\Fiche');
    }
}
