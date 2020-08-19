<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{

    public function mouves(){
        return $this->belongsTo('App\Mouve','id');
    }

}

