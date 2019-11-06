<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


//    public function back(Request $request)
//    {
//        $email = $request->email;
//        $password = $request->password;
//
//        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            $user = Auth::user();
//            //if ($user->hasRole('Acheteur')) {
//
//            return redirect()->route('afficheBackend');
//            //   }
////        } else {
////            return redirect()->route('commande_identification')->with('notice', 'impossible de vous identifier');
////        }
//    }




}
