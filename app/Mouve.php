<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mouve extends Model
{
    //



    public function user()
   {
      return $this->belongsTo('App\User');
    }


    public function commentaires(){
        return $this->belongsTo('App\Commentaire','id','url_video');
    }


   protected $fillable = ['nom','email','texte'];
    public function comments(){
        return $this->hasMany('App\Comment');
    }


    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }


//    public function getVideoHtmlAttribute()
//    {
//        $embed = Embed::make($this->video)->parseUrl();
//
//        if (!$embed)
//        return '';
//
//        $embed->setAttribute(['width' => 400]);
//        return $embed->getHtml();
//    }


}
