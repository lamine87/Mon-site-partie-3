<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movi extends Model
{
    //
    public function artistes()
    {


        return $this->hasMany('App\Artiste');
    }

    public function tags()
    {
        return $this->belongsTo('App\Tag');
    }
}
