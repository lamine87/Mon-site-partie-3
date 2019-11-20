<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_mouve extends Model
{
    //
    public function media_tag()
    {
        return $this->belongsTo('App\Media_tag');
    }
}
