<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mouve extends Model
{


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function countrie()
    {
        return $this->belongsTo('App\Country');
    }

    public function commentaires()
    {
        return $this->belongsTo('App\Commentaire', 'id', 'url_video');
    }


//   protected $fillable = ['nom','email','texte'];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function categories()
    {
//        return $this->belongsToMany('App\Categorie', 'id', 'nom')
//            ->using('App\CategorieMouve')
//            ->withPivot([
//                'categorie_id',
//                'mouve_id',
//            ]);
    }
}




