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
    public function index(Request $request)
    {
        if (auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page.")->error();
            return redirect('login');
        }


        $user = User::all();

        $mouve = DB::table('mouves')->where('user_id', '=',15)->paginate(6);

        return view('backend.artiste',['users' => $user,'mouves' => $mouve]);

////        $user = User::find($request->id);
////        $user = Auth::user();
//        $mouve = Mouve::where('user_id','=','id')->paginate(6);
//
////       $mouve = DB::table('mouves')->where('user_id', '=', 'id')->paginate(6);
//
//        return view('backend.artiste', ['mouves' => $mouve]);
    }

//        $email = $request->email;
//        $password = $request->password;
//
//        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            $user = Auth::user();
//
//
//            if ($user->hasRole('Administrateur')) {
//                //Retourn route('backend_homepage');
//                //Si le user est admin>redirection vers le backend
//                return redirect()->route('backend_homepage');
//            } else {
//                //Si le user n'est pas admin
//                return redirect()->route('homepage');
//            }
//
//        } else {
//            return redirect()->route('login')->with('message', 'impossible de vous identifier');
//        }
//    }
//
//    public function loginProcess(Request $request)
//    {
//        $email = $request->email;
//        $password = $request->password;
//
//        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            $user = Auth::user();
//            //if ($user->hasRole('Acheteur')) {
//
//            return redirect()->route('commande_adresse');
//            //   }
//        } else {
//            return redirect()->route('commande_identification')->with('notice', 'impossible de vous identifier');
//        }
//    }
//


}
