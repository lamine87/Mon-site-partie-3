<?php

namespace App\Http\Controllers;


use App\Mouve;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page.")->error();
            return redirect('login');
        }

        $users = Auth::user();
        $user = User::all();

        $mouve = DB::table('mouves')->where('user_id', '=',$users->id)->paginate(6);

        return view('backend.artiste',['users' => $user,'mouves' => $mouve]);


    }


}
