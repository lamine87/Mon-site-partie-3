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

        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('shop.home', ['users' => $user,'countries'=>$countrie,'mouves'=>$mouve,'categories'=>$categorie]);
    }


    public function voirCategorie(Request $request){
        $user = User::all();
        $countrie = Country::all();
        $categorie = Categorie::all();

        $mouve = DB::table('mouves')
            ->join('categorie_mouves', 'mouves.id', '=', 'categorie_mouves.mouve_id')
            ->join('categories', 'categories.id', '=', 'categorie_mouves.categorie_id')
            ->where('categorie_id', '=', $request->id)
            ->orderBy('mouves.created_at', 'desc')->paginate(12);

        return view('shop.categorie', [
            'users'=>$user,
            'mouves'=>$mouve,
            'categories' => $categorie,
            'countries'=>$countrie
        ]);
    }




    public function nation(Request $request){
        $user = User::all();
        $categorie = Categorie::all();
        $countrie = Country::all();

        $mouve = DB::table('mouves')->where('countrie_id', '=',$request->id)->orderBy('created_at', 'desc')->paginate(12);

        return view('shop.pays', ['countries'=>$countrie,'categories'=>$categorie,'mouves'=>$mouve,'users'=>$user]);
    }


    public function titre(Request $request)
        {
            $categorie = Categorie::all();
            $users = User::find($request->id);
            $countrie = Country::all();

            $mouve = DB::table('mouves')->where('user_id', '=',$users->id)->orderBy('created_at', 'desc')->paginate(30);

            return view('shop.affiche_tag',['users'=>$users,'mouves'=>$mouve,'categories'=>$categorie,'countries'=>$countrie]);
    }



    public function artiste(Request $request)
    {

        $categorie = Categorie::all();
        $mouve = Mouve::find($request->id);
        $user = User::all();
        $countrie = Country::all();
         // Affichage des commentaires
        $commentaire = DB::table('commentaires')
            ->where('mouve_id', '=',$request->id)->orderBy('created_at', 'desc')->get();

        $mouves = DB::table('mouves')->take(12)->get();



        return view('shop.voir_artiste',['users'=>$user,'categories'=>$categorie,'countries'=>$countrie,'commentaires'=>$commentaire,'mouve'=>$mouve,'mouves'=>$mouves]);
      }


    public function tag(Request $request)
    {
        $categorie = Categorie::all();
        $users = User::all();
        $countrie = Country::all();
        $mouve = DB::table('mouves')->where('user_id', '=',$request->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('shop.tag_artiste',['users'=>$users,'countries'=>$countrie,'mouves'=>$mouve,'categories'=>$categorie]);
    }


    public function recherche(Request $request)
    {
        $user = User::all();
        $categorie = Categorie::all();
        $countrie = Country::all();

        $search = $request->get('search');
        $mouve = DB::table('mouves')->where('photo_principale', 'like','%'.$search.'%')->orderBy('created_at', 'desc')->paginate(18);

        return view('shop.recherche',['mouves'=>$mouve,'users'=>$user,'categories'=>$categorie,'countries'=>$countrie]);

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

        return view('backend.edit_liste_user', ['user'=>$user]);
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
