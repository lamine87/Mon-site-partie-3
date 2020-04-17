<?php

namespace App\Http\Controllers\Backend;


use App\Actualite;
use App\Artiste_recommande;
use App\Categorie;
use App\Commentaire;
use App\Country;
use App\Http\Controllers\Controller;
use App\Mouve;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ArtisteController extends Controller
{
    // Affichage de l'espace pour user
    public function index(Request $request)
    {
        $user = Auth::user();
        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('backend.index',['users'=>$user,'mouves'=>$mouve]);
    }


    // Affichage de la page d'aide a utilisation
    public function aide()
    {
        $categorie = Categorie::all();
        return view('url_video',['categories'=>$categorie]);
    }


    // Enregistrer la musique dans la base de données
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate(
            [
                'url_video' => 'required',
                'description' => 'required | max:200',
                'lien_facebook' => 'required',
                'lien_instagram' => 'required',
                'photo_principale' => 'required|image|max:1999']
        );
        if ($request->hasFile('photo_principale')) {

            // Recuperer le nom de l'image saisi par l'utilisateur
            $fileName = $request->file('photo_principale')->getClientOriginalName();

            //Telechargement de l'image
            $request->file('photo_principale')->storeAs('public/uploads', $fileName);

            $img = Image::make($request->file('photo_principale')->getRealPath());

            //Dimensionner l'image

            $img->resize(500, 500);

            // Imprimer l'icon sur l'image
            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);

            $img->save('storage/uploads/' .$fileName);

        }

            $user->lien_facebook = $request->lien_facebook;
            $user->lien_instagram = $request->lien_instagram;
            $user->save();


            $mouve = new Mouve();
            $mouve->url_video = $request->url_video;
            $mouve->description = $request->description;
            $mouve->photo_principale = $fileName;
            $mouve->user_id = $user->id;
//        if ($request->is_online == 1) {
//            $mouve->is_online = $request->is_online;
//        } else {
//            $mouve->is_online = false;
//        }
            $mouve->save();
//        if ($request->mouves) {
//            foreach ($request->mouves as $id) {
//                $mouve->user()->attach($id);
//            }
//        }
//
//        if ($request->users) {
//            foreach ($request->users as $id) {
//                $user->mouve()->attach($id);
//            }
//        }
        return redirect()->route('home')->with('notice', 'La Musique à bien été ajouté');
    }

     //  Modification de musique dejà enregistrer
    public function edit(Request $request)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);

        return view('backend.edit', [

            'user' => $user,
            'mouve' => $mouve,
        ]);
    }

    // Validation de la modification
    public function update(Request $request,  $uniqid)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);

        $request->validate(
            [
                'url_video' => 'required',
                'description' => 'required | max:200',
                'lien_facebook' => 'required',
                'lien_instagram' => 'required',
//                'photo_principale' => 'required|image|max:1999'
            ]
        );
//        if ($request->hasFile('photo_principale')) {
//
//            // Recuperer le nom de l'image saisi par l'utilisateur
//            $fileName = $request->file('photo_principale')->getClientOriginalName();
//
//            //Telechargement de l'image
//            $request->file('photo_principale')->storeAs('public/uploads', $uniqid.$fileName);
//
//            $img = Image::make($request->file('photo_principale')->getRealPath());
//
//            //Dimensionner l'image
//
//            $img->resize(400, 400);
//
//            // Imprimer l'icon sur l'image
//            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);
//
//            $img->save('storage/uploads/' . $fileName);
//
//        }

        $user->lien_facebook = $request->lien_facebook;
        $user->lien_instagram = $request->lien_instagram;
        $user->save();


        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
//        $mouve->photo_principale = $fileName;
        $mouve->save();

        return redirect()->route('home')->with('notice', 'Musique <strong>' .$user->nom. '</strong> a bien été Modifier');
    }

    public function delete(Request $request)
    {
        $mouve = Mouve::find($request->id);
        $mouve->delete();
        return redirect()->route('home')->with('notice', 'Artiste <strong>' .$mouve->nom. '</strong> a été supprimé');

    }
    // Affichage de la page actualité
    public function actu(){
        $categorie = Categorie::all();
        $countrie = Country::all();
        $actualite = DB::table('actualites')
            ->orderBy('created_at', 'desc')->paginate(6);
        return view('shop.actualite',['actualites'=>$actualite,'countries'=>$countrie,'categories'=>$categorie]);
    }
       // Affichage des vidéos de la page actualité
    public function videoActu(Request $request){
        $countrie = Country::all();
        $categorie = Categorie::all();
        $actualite = Actualite::find($request->id);
        return view('shop.voir_actu',['actualite'=>$actualite,'countries'=>$countrie,'categories'=>$categorie]);
    }

}

