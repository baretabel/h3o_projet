<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territoire extends Model
{
    //
    public function projet(){
        return $this->belongsTo('App\Projet');
    }
    
}
