<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    //

    public function enregistrer(){
        return view('auth.register');
    }

    public function back(){
        return view('afficheBackend');
    }

}
