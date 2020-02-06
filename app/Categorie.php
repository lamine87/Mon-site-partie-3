<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

//    public function mouves()
//    {
//        return $this->belongsToMany('App\Mouve');
////
//
//    }

    public function mouves()
    {
        return $this->belongsToMany
        ('App\Mouve', 'categorie_mouves')
            ->withTimestamps()
            ->using('App\CommandeProduit')
            ->withPivot('categorie_id', 'mouve_id');
    }
}
