<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mouve extends Model
{

//    protected $fillable = ['id', 'nom','url_video'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function countries()
    {
        return $this->belongsTo('App\Country', 'id');
    }


    public function commentaire()
    {
        return $this->hasMany('App\Commentaire', 'id');

    }
    public function like()
    {
        return $this->hasMany('App\Like', 'id');

    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie')->withTimestamps();

    }

}




