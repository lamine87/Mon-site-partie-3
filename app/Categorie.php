<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    public function mouves()
    {
        return $this->belongsToMany('App\Mouve');
//
    }
}
