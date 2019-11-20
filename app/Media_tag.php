<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media_tag extends Model
{
    //
    public function tag()
    {
        return $this->hasMany('App\Tag');
    }

    public function tag_mouve()
    {
        return $this->hasOne('App\Tag_mouve');
    }
}
