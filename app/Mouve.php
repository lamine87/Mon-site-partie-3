<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mouve extends Model
{

    protected $fillable = ['id', 'nom'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function countrie()
    {
        return $this->belongsTo('App\Country', 'id');
    }


    public function commentaires()
    {
        return $this->belongsTo('App\Commentaire', 'id', 'url_video');

    }




    public function categories()
    {
        return $this->belongsToMany('App\Categorie')->withTimestamps();

    }

}




