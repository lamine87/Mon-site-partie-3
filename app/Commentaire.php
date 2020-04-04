<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //

//    protected $table = ['url_video'];


    public function mouve(){
        return $this->belongsTo('App\Mouve','id','url_video');
    }
    protected $fillable = ['url_video'];


}

