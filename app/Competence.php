<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    public function resssource(){
        return $this->belongsTo('App\Ressource');
    }
}
