<?php

namespace App\Http\Controllers\Shop;

use App\Artiste;
use App\Artiste_recommade;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Media_tag;
use App\Mouve;
use App\Tag_mouve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index()
    {
        $artistes = DB::table('artistes')
            ->orderBy('created_at', 'desc')->paginate(20);

        $tags = DB::table('tags')
            ->orderBy('created_at', 'desc')->paginate(20);;

        return view('shop.home', ['artistes' => $artistes,'tags' => $tags]);

    }


    public function voirArtiste(Request $request)
    {
        $artiste = Artiste::find($request->id);
        $mouves = Mouve::find($request->id);

        $artiste_recommandes = DB::table('artiste_recommandes')
            ->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.voir_artiste',['artiste' => $artiste,'artiste_recommandes' => $artiste_recommandes,'mouves' => $mouves]);
      }


    public function tag(Request $request)
    {
        $media_tag = Media_tag::find($request->tag_id);
        $media_tags = DB::table('media_tags')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('shop.tag_artiste',['media_tags' => $media_tags,'media_tag'=>$media_tag]);

    }


}
