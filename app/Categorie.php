<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    protected $fillable = ['id', 'nom'];


    public function mouves()

    {
        return $this->belongsToMany('App\Mouve')->withTimestamps();

        }
    }
