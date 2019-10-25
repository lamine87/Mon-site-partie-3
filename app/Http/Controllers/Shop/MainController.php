<?php

namespace App\Http\Controllers\Shop;

use App\Artiste;
use App\Artiste_recommade;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index()
    {

        $artistes = DB::table('artistes')
            ->orderBy('created_at', 'desc')->paginate(20);

        $tag = DB::table('tags')
            ->orderBy('created_at', 'desc')->paginate(20);;


        return view('shop.home', ['artistes' => $artistes, 'tags' => $tag]);

    }


    public function voirArtiste(Request $request)
    {
        $artiste = Artiste::find($request->id);

        $artiste_recommandes = DB::table('artiste_recommandes')
            ->orderBy('created_at', 'desc')->paginate(12);


        return view('shop.voir_artiste',['artiste' => $artiste,'artiste_recommandes' => $artiste_recommandes]);
    }

    public function voirTag(Request $request){

        $artiste = Artiste::find($request->tag_id);
        $artistes = DB::table('artistes')
            ->orderBy('created_at', 'desc')->paginate(24);

        return view('oeuvre_artiste', ['artistes' => $artistes,'artiste' => $artiste]);

    }

}
