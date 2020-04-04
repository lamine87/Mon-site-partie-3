<?php

namespace App\Http\Controllers\Shop;

use App\Artiste_recommade;
use App\Categorie;
use App\Commentaire;
use App\Country;
use App\Http\Controllers\Controller;
use App\Mouve;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



use Symfony\Component\Console\Input\Input;

class MainController extends Controller
{
    //

    public function index()
    {
        $countrie = Country::all();
        $user = User::all();
        $categorie = Categorie::all();
//        $cat = Categorie::find($request->id);

        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('shop.home', ['users' => $user,'countries'=>$countrie,'mouves'=>$mouve,'categories'=>$categorie]);
    }

//public function nave(Request $request){
//
//    $categorie = Categorie::find($request->id);
//
//        return view('shop.nav',['categories'=>$categorie]);
//}


    public function voirCategorie(Request $request){
//        $user = User::all();
        $countrie = Country::all();
        $categorie = Categorie::find($request->id);
//        $mouve = $categorie->mouves;

//        $mouve = DB::table('categorie_mouves')
//            ->join('mouves', 'mouves.id', '=',
//                'categorie_mouves.mouve_id')
//            ->join('categories', 'categories.id', '=',
//                'categorie_mouves.categorie_id')
//            ->select('categorie_mouves.*','mouves.*', 'categories.*')->get();
//            dd($mouve);
        $mouve = DB::table('categorie_mouves')->where('mouve_id', '=',$categorie->id);

        return view('shop.categorie', [
//            'users'=>$user,
            'mouves'=>$mouve,
            'categories'=>$categorie,
//            'cat'=>$cat,
            'countries'=>$countrie
        ]);
    }


//    public function index(Request $request)
//    {
//        $countrie = Country::all();
//        $user = User::all();
//        $categorie = Categorie::all();
//        $mouve = DB::table('mouves')
//            ->orderBy('created_at', 'desc')->paginate(20);
//

//        $test = DB::table('categorie_mouves')
//            ->join('mouves', 'mouves.id', '=',
//                'categorie_mouves.mouve_id')
//            ->join('categories', 'categories.id', '=',
//                'categorie_mouves.categorie_id')
//            ->select('categorie_mouves.*', 'mouves.*', 'categories.*')
//            ->get();
//
//        dd($test);
//
//
//
//        return view('shop.home', ['users' => $user, 'countries' =>
//            $countrie, 'mouves' => $mouve, 'mouve' => $mouve, 'categories' =>
//            $categorie]);



    public function nation(Request $request){
        $user = User::all();
        $categorie = Categorie::all();
        $countrie = Country::find($request->id);

        $mouve = DB::table('mouves')->where('countrie_id', '=',$countrie->id)->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.pays', ['countries'=>$countrie,'categories'=>$categorie,'mouves'=>$mouve,'users'=>$user]);
    }


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

        $categorie = Categorie::all();
        $mouve = Mouve::find($request->id);
        $user = User::find($request->id);
        $countrie = Country::all();
         // Affichage des commentaires
        $commentaire = DB::table('commentaires')->where('mouve_id', '=',$mouve->id)->orderBy('created_at', 'desc')->get();

        $artiste_recommandes = DB::table('artiste_recommandes')
            ->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.voir_artiste',['users'=>$user,'categories'=>$categorie,'countries'=>$countrie,'mouves'=>$mouve,'commentaires'=>$commentaire,'mouve'=>$mouve,'artiste_recommandes' => $artiste_recommandes]);
      }


    public function tag(Request $request)
    {
        $categorie = Categorie::find($request->id);
        $users = User::find($request->id);

        $mouve = DB::table('mouves')->where('user_id', '=',$users->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('shop.tag_artiste',['users'=>$users,'mouves'=>$mouve,'categories'=>$categorie]);
    }


    public function recherche()
    {
        $mouve = Mouve::all();
        $mots = Input::get('search');
        $resultats = Mouve::where('desc_mouve','LIKE','%'.$mots .'%')
            ->orwhere('lib_mouve','LIKE','%'.$mots.'%')->paginate(4);
//        $request->validate([
//            'query'=>'required|min:3',
//        ]);
//        $query = $request->input('query');
//        $user = User::where('name','lien_facebook','lien_instagram','LIKE','%'.$query.'%');
//
//        $mouve = Mouve::where('description','photo_principale','LIKE','%'.$query.'%');

        return view('shop.recherche',['mouves'=>$mouve,'resultats'=>$resultats]);

    }


    public function liste(){

        $user = DB::table('users')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('backend.liste_user',['users'=>$user]);

    }


    public function store(Request $request){
        $mouve = Mouve::find($request->id);

        $request->validate(
            [
                'nom'=>'required|max:20',
                'email'=>'required',
                'texte'=>'required|max:50']
        );
        $commentaire = new Commentaire();
        $commentaire->nom = $request->nom;
        $commentaire->email = $request->email;
        $commentaire->texte = $request->texte;
        $commentaire->mouve_id = $mouve->id;

        $commentaire->save();

        return redirect()->route('comment_Video')->with('notice', 'Le commentaire a bien été envoyé');

    }


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

//
//    // Appel ajax
//$.ajax({
//url: BASE_URL + SPECIFIC,
//method: 'POST',
//dataType: 'json',
//data: dataToSend
//}).done(function (response) {
//    console.log(response);
//
//    // Si ok => je redirige
//    if (response.code == 1) {
//        // Je change ma div alert en mode "succès"
//        $('#alerts').removeClass('alert-danger').addClass('alert-success').html('Connexion réussie').show();
//        // Je redirige après 2 secondes
//
//        window.setTimeout(function () {
//            location.href = response.redirect;
//        }, 1000);
//    }
//    // Sinon, il y a une erreur => affichage des erreurs
//    else {
//        // Je cible la div des alertes
//        var $alertsDiv = $('#alerts');
//        // Je change le contenu HTML par la liste des erreurs retournées
//        $alertsDiv.empty();
//        // foreach made in jQuery (ressemble au foreach de PHP)
//        $.each(response.errors, function (index, value) {
//            $alertsDiv.append(value + '<br>');
//        });
//        // J'affiche les alertes
//        $alertsDiv.show();
//    }
//}).fail(function (jqXHR, textStatus, errorThrown) {
//    alert('Ajax failed');
//    console.log(jqXHR, textStatus, errorThrown);

}
