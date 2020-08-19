<?php

namespace App\Http\Controllers\Backend;

use App\Categorie;
use App\Commentaire;
use App\Country;
use App\Http\Controllers\Controller;
use App\Like;
use App\Mouve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AimeController extends Controller
{
//
//    public function update(Request $request)
//    {
//        $categorie = Categorie::all();
//        $countrie = Country::all();
//        $commentaire = Commentaire::all();
//        $mouve = Mouve::find($request->id);
//
//         $like = DB::table('likes')
//            ->updateOrInsert(['like_id'=> 1, 'mouve_id' => $mouve->id]);
////        return redirect()->route('voirArtiste',['id'=>$like]);
//
//        return view('shop.voir_artiste',['like'=>$like,'likes'=>$like,'categories'=>$categorie,'countries'=>$countrie,'commentaires'=>$commentaire,'mouves'=>$mouve,'mouve'=>$mouve]);
//    }

//    public function updateDislike(Request $request)
//    {
//        $categorie = Categorie::all();
//        $countrie = Country::all();
//        $commentaire = Commentaire::all();
//        $mouve = Mouve::find($request->id);
//
//        $dislike = DB::table('dislikes')
//            ->updateOrInsert(['dislike_id'=> -1, 'mouve_id' => $mouve->id]);
//
//        return view('shop.voir_artiste',['dislike'=>$dislike,'dislikes'=>$dislike,'categories'=>$categorie,'countries'=>$countrie,'commentaires'=>$commentaire,'mouves'=>$mouve,'mouve'=>$mouve]);
//    }

//    public function postLike(Request $request)
//    {
//        $mouve = Mouve::find($request->id);
//         $mouve = DB::table('likes')->increment('like_id',1, $mouve->id);
//
////        $like = Like::where('like_id', $mouve->id)->increment('1');
//
//        return view('shop.voir_artiste',['mouve'=>$mouve]);
//
//    }

//    public function postLike(Request $request){
//        $mouve = Mouve::find($request->id);
//        $like = DB::table('likes')
//            ->updateOrInsert(['like_id'=> 1, 'mouve_id' => $mouve->id]);
//        return redirect()->route('voirArtiste',['id'=>$like]);
//    }
    public function postLike(Request $request){
        $mouve = Mouve::find($request->id);

       $like = DB::table('likes')
            ->where('like_id','=',1)
            ->increment('like_id', $mouve->id);

//            $like = DB::table('likes')
//                ->increment('like_id',1, $mouve->id);

        return redirect()->route('voirArtiste',['id'=>$like,'mouve'=>$mouve]);
    }

}
