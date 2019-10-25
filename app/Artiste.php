<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    //
    public function movis()
    {
        return $this->belongsTo('App\Movi');
    }
}
