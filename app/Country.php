<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable=['id'];

    public function mouve(){

        return $this->hasMany('App\Mouve','id');

    }

}
