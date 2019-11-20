<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function Media_tags(){

        return $this->hasMany('App\Media_tag');
    }

}
