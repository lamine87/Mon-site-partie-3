<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
//    protected $fillable = ['id','nom','image_drapeau'];

    public function mouves(){

        return $this->hasMany('App\Mouve','id');
    }
}
