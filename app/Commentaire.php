<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //

    protected $table = ['id','nom','email','texte'];


    public function mouves(){
        return $this->belongsTo('App\Mouve','id');
    }


}

