<?php

namespace App\Http\Controllers\Shop;

use App\Artiste;
use App\Artiste_recommande;
use App\Http\Controllers\Controller;
use App\Mouve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessController extends Controller
{
    //

    public function enregistrer()
    {
        return view('auth.register');
    }



}
