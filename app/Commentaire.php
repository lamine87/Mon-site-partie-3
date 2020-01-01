<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //

    protected $fillable = [
        'url_video', 'id', 'description'
    ];

    public function mouve(){
        return $this->belongsTo('App\Mouve','id','url_video');
    }



}

