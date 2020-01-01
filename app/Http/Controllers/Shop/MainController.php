<?php

namespace App\Http\Controllers\Shop;

use App\Artiste_recommade;
use App\Categorie;
use App\Commentaire;

use App\Http\Controllers\Controller;


use App\Mouve;
use App\User;
use Carbon\Carbon;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = User::all();
        $categorie = Categorie::all();
        $categories = Categorie::find($request->id);

        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('shop.home', ['users' => $user,'mouves' => $mouve,'mouve' => $mouve,'categories'=>$categories,'categorie'=>$categorie]);
    }



    public function voirCategorie(Request $request){
        $user = User::all();

//        $categories = Categorie::all();
        $categorie = Categorie::find($request->id);

        $mouves = $categorie->mouves;

//        $mouve = DB::table('mouves')->where('categorie_id', '=',$categorie->id)->orderBy('created_at', 'desc')->paginate(20);
//        $mouve = DB::table('mouves')->where('categorie_id', '=',$categorie->id)->orderBy('created_at', 'desc')->get();

        return view('shop.categorie', ['users'=>$user,'mouves'=>$mouves,'categories'=>$categorie]);
    }


//
//    public function category(Request $request){
//
//        $mouve = Mouve::find($request->id);
//        $categorie = Categorie::find($request->id);
//
//        return view('shop.voir_artiste', ['mouves'=>$mouve]);
//    }


    public function titre(Request $request)
        {
            $categorie = Categorie::all();
            $users = User::find($request->id);

            $mouve = DB::table('mouves')->where('user_id', '=',$users->id)->orderBy('created_at', 'desc')->paginate(30);

            return view('shop.affiche_tag',['users'=>$users,'mouves'=>$mouve,'categories'=>$categorie]);
    }


    public function artiste(Request $request)
    {
        $commentaire = Commentaire::find($request->id);
        $categorie = Categorie::all();
        $mouve = Mouve::find($request->id);
        $user = User::find($request->id);

         // Affichage des commentaires
//        $commentaire = DB::table('commentaires')->where('mouve_id', '=',$mouve->id)->orderBy('created_at', 'desc')->get();

        $artiste_recommandes = DB::table('artiste_recommandes')
            ->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.voir_artiste',['users'=>$user,'categories'=>$categorie,'mouves'=>$mouve,'commentaire'=>$commentaire,'mouve'=>$mouve,'artiste_recommandes' => $artiste_recommandes]);
      }




    public function tag(Request $request)
    {
        $categorie = Categorie::find($request->id);
        $users = User::find($request->id);

        $mouve = DB::table('mouves')->where('user_id', '=',$users->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('shop.tag_artiste',['users'=>$users,'mouves'=>$mouve,'categories'=>$categorie]);
    }


    public function recherche(Request $request)
    {
        $categorie = Categorie::all();
        $request->validate([
            'query'=>'required|min:3',
        ]);
        $query = $request->input('query');
        $user = User::where('name','lien_facebook','lien_instagram','LIKE','%'.$query.'%');

        $mouve = Mouve::where('description','photo_principale','LIKE','%'.$query.'%');

        return view('shop.recherche',['users'=>$user,'mouves'=>$mouve,'categories'=>$categorie,'query'=>$query]);

    }


    public function liste(){

        $user = DB::table('users')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('backend.liste_user',['users'=>$user]);

    }


//    public function store(Request $request){
//        $mouve = Mouve::find($request->id);
//
//        $request->validate(
//            [
//                'nom'=>'required',
//                'email'=>'required',
//                'texte'=>'required|max:200']
//        );
//        $commentaire = new Commentaire();
//        $commentaire->nom = $request->nom;
//        $commentaire->email = $request->email;
//        $commentaire->texte = $request->texte;
//        $commentaire->mouve_id = $mouve->id;
//
//        $commentaire->save();
//
//
//        return redirect()->route('voir_artiste')->with('notice', 'Le commentaire a bien été envoyé');
//
//    }

//    public function store(){
//
//        request()->validate(
//            [
//                'content'=>['required'],
//
//        ]);
//     Comment::create([
//          'nom' => 'nom',
//          'email'=> 'email',
//           'texte'=> request('content'),
//      ]);
//
//
//        return ('Votre commentaire à bien été ajouté');
//
//    }









    public function editListe(Request $request)
    {
        $user = User::find($request->id);

        return view('backend.edit_liste_user', ['user' => $user]);
    }


    public function update(Request $request)
    {
        $user = User::find($request->id);

//        $user->update($request->all());

        $request->validate(
            [
//                'name' => 'required',
                'lien_facebook' => 'required',
                'lien_instagram' => 'required',
            ]);

//        $user->name = $request->name;
        $user->lien_facebook = $request->lien_facebook;
        $user->lien_instagram = $request->lien_instagram;
        $user->save();

        return redirect()->route('user_liste')->with('notice', 'Musique <strong>' . $user->name . '</strong> a bien été Modifier');
    }


    public function bannir(Request $request)
    {
        $user = User::find($request->id);
        $request->validate(
            [
                'bannir_user' => 'required',
            ]);

        $user->bannir_user = $request->bannir_user;
        $user->date();


        return redirect()->route('user_liste')->with('notice', 'Artiste <strong>' . $user->nom . '</strong> a été banni');

    }

}
