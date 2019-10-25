<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisteController extends Controller
{

    public function index(){
        //$user = Auth::user();
        return view('backend.artiste');
//    }
//    public function affiche(){
//        return view('backend.index');
   }
}
