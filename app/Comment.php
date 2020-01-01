<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['nom','email','texte'];

//    public function mouve(){
//        return $this->belongsTo('App\Mouve','nom','email','texte');
//    }

}
