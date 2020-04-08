<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    protected $fillable = ['id', 'nom'];



    public function mouve()

    {
        return $this->belongsToMany('App\Mouve','id')
            ->using('App\CategorieMouve')
            ->withPivot([
                'categorie_id',
                'mouve_id',
            ]);
        }


    }
