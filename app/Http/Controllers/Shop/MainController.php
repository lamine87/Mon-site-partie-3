<?php

namespace App\Http\Controllers\Shop;

use App\Artiste;
use App\Artiste_recommade;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Media_tag;
use App\Mouve;
use App\Tag_mouve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index()
    {
        $user = User::all();

        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(20);

        $tag = DB::table('tags')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('shop.home', ['users'=>$user,'tags' => $tag,'mouves' => $mouve]);

    }


    public function artiste(Request $request)
    {
        $mouve = Mouve::find($request->id);

        $artiste_recommandes = DB::table('artiste_recommandes')
            ->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.voir_artiste',['mouves'=>$mouve,'artiste_recommandes' => $artiste_recommandes]);
      }



    public function tag(Request $request)
    {
        $tags = Tag::find($request->id);

        $media_tag = DB::table('media_tags')->where('tag_id', '=',$tags->id)->paginate(6);

        return view('shop.tag_artiste',['tags'=>$tags,'media_tags'=>$media_tag]);

    }

}
