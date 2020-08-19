<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Conner\Likeable\LikeableTrait;

class Like extends Model
{
    //
    protected $fillable = ['url_video','id'];
   public function mouves(){
    return $this->belongsTo('App\Mouve','id','url_video');
  }
}
