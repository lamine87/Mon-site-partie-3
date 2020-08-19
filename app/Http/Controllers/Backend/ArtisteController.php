<?php

namespace App\Http\Controllers\Backend;


use App\Actualite;
use App\Categorie;
use App\Country;
use App\Http\Controllers\Controller;
use App\Mouve;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ArtisteController extends Controller
{
    // Affichage de l'espace pour user
    public function index()
    {
        $user = Auth::user();
        $categorie = Categorie::all();
        $countrie = Country::all();
        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(6);
        return view('backend.index',['users'=>$user,'mouves'=>$mouve,'countries'=>$countrie,'categories'=>$categorie]);
    }


    // Affichage de la page d'aide a utilisation
    public function aide()
    {
        $categorie = Categorie::all();
        return view('url_video',['categories'=>$categorie]);
    }
    // Enregistrer la musique dans la base de données par l'utilisateur
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate(
            ['url_video' => 'required',
                'description' => 'required | max:150',
                'countrie_id'=> 'required',
                'categories'=> 'required',
                'photo_principale' => 'required|image|max:1999']);
        if ($request->hasFile('photo_principale')) {
            $uniqid = uniqid();
            // Recuperer le nom de l'image saisi par l'utilisateur
            $fileName = $request->file('photo_principale')->getClientOriginalName();
            //Telechargement de l'image
            $request->file('photo_principale')->storeAs('storage/uploads', $uniqid.$fileName);

            $img = Image::make($request->file('photo_principale')->getRealPath());

            //Dimensionner l'image
            $img->resize(500, 500);

            // Imprimer l'icon sur l'image
            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 3, 3);

            $img->save('storage/uploads/'.$uniqid.$fileName);
        }
            $mouve = new Mouve();
            $mouve->url_video = $request->url_video;
            $mouve->description = $request->description;
            $mouve->photo_principale = $uniqid.$fileName;
            $mouve->countrie_id = $request->countrie_id;

            $mouve->user_id = $user->id;
            $mouve->save();

            if ($request->categories) {
              foreach ($request->categories as $id) {
              $mouve->categories()->attach($id);
             }
            }
        return redirect()->route('home',['id'=>$mouve->categorie_id])
            ->with('notice','La Musique a bien été ajouté, attendez la validation par l\'administrateur ');
    }

     //  Modification de musique dejà enregistrer dans la base de données
    public function edit(Request $request)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);
        $categorie = Categorie::all();
        $countrie = Country::all();
        return view('backend.edit', [
            'countries'=>$countrie,
            'categories'=>$categorie,
            'user' => $user,
            'mouve' => $mouve,
        ]);
    }

    // Validation de la modification
    public function update(Request $request)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);
        $request->validate(
            [
                'url_video' => 'required',
                'description' => 'required | max:150',
                'lien_facebook'=> 'required',
                'lien_instagram'=> 'required',
                'countrie_id'=> 'required',
                'categories'=> 'required',
//                'photo_principale' => 'required|image|max:1999'
            ]
        );
//        if ($request->hasFile('photo_principale')) {
//            $uniqid = uniqid();
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
//            $img->resize(500, 500);
//
//            // Imprimer l'icon sur l'image
//            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);
//
//            $img->save('storage/uploads/'.$fileName);
//        }

        $user->lien_facebook = $request->lien_facebook;
        $user->lien_instagram = $request->lien_instagram;
        $user->save();


        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
//        $mouve->photo_principale = $fileName;
        $mouve->countrie_id = $request->countrie_id;
        $mouve->save();

        $mouve->categories()->sync($request->categories);


        return redirect()->route('home')->with('notice','La Musique a bien été modifié');
    }

    public function delete(Request $request)
    {
        $mouve = Mouve::find($request->id);
        $mouve->delete();
        return redirect()->route('home')->with('notice','La Musique a bien été supprimé');

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

