<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    //
    public function projet(){
        return $this->belongsTo('App\Projet');
    }
}
