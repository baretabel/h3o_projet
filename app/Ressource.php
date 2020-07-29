<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    //
    public function projet(){
        return $this->belongsTo('App\Projet');
        
    }
    public function project(){
        return $this->belongsTo('App\Project');
        
    }
    public function competence(){
        return $this->hasMany('App\Competence');
    }
    public function fiche(){
        return $this->belongsTo('App\Fiche');
    }
}
