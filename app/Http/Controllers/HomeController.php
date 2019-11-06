<?php

namespace App\Http\Controllers;

use App\Artiste;
use App\Mouve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artiste = DB::table('artistes')
            ->orderBy('created_at', 'desc')->paginate(6);
        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(6);


        return view('backend.artiste', ['artistes' => $artiste,'mouves' => $mouve]);
    }


}
