<?php

namespace App\Http\Controllers\Shop;


use App\Artiste_recommande;
use App\Http\Controllers\Controller;
use App\Media_recommande;
use App\Mouve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProcessController extends Controller
{
    // Création de compte
    public function enregistrer()
    {
        return view('auth.register');
    }


    // Affichage de l'espace administrateur
    public function admin(){

        $user = User::all();
        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('backend.admin_gestion',['users' => $user,'mouves' => $mouve]);
    }


    public function ajout(){

        return view('backend.admin_ajoute');
    }

     //Enregistrement de musique dans la base de données pour administrateur
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

            //Recuperer le nom de l'image saisi par l'utilisateur
            $fileName = $request->file('photo_principale')->getClientOriginalName();

            //Telechargement de l'image
            $request->file('photo_principale')->storeAs('public/uploads', $fileName);

            $img = Image::make($request->file('photo_principale')->getRealPath());

            //Dimensionner l'image
            $img->resize(400, 400);

            // Imprimer l'icon sur l'image
            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);

            $img->save('storage/uploads/' . $fileName);
        }


        $user->lien_facebook = $request->lien_facebook;
        $user->lien_instagram = $request->lien_instagram;
        $user->save();

        $mouve = new Mouve();

        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
        $mouve->photo_principale = $fileName;
        $mouve->user_id = $user->id;
        $mouve->save();


        return redirect()->route('home')->with('notice', 'Artiste <strong>' . $user->id . '</strong> a bien été ajouté');
    }

    //  Modification de musique dejà enregistrer
    public function edit(Request $request)
    {

        $user = User::find($request->id);
        $mouve = Mouve::find($request->id);

        return view('backend.edit', [

            'artiste' => $user,
            'user' => $mouve,

        ]);
    }

    // Validation de la modification
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $mouve = Mouve::find($request->id);

        $request->validate(
            [
                'url_video' => 'required',
                'description' => 'required | max:200',
                'lien_facebook' => 'required',
                'lien_instagram' => 'required',
                'photo_principale' => 'required|image|max:1999']
        );
        if ($request->hasFile('photo_principale')) {

            //Recuperer le nom de l'image saisi par l'utilisateur
            $fileName = $request->file('photo_principale')->getClientOriginalName();

            //Telechargement de l'image
            $request->file('photo_principale')->storeAs('public/uploads',$fileName);

            $img = Image::make($request->file('photo_principale')->getRealPath());

            //Dimensionner l'image
            $img->resize(400, 400);

            // Imprimer l'icon sur l'image
            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);

            $img->save('storage/uploads/' .$fileName);

        }

        $user->id = $request->id;
        $user->description = $request->description;
        $user->lien_facebook = $request->lien_facebook;
        $user->lien_instagram = $request->lien_instagram;
        $user->photo_principale = $fileName;
        $user->save();


        $mouve->id = $request->id;
        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
        $mouve->save();
        return redirect()->route('home')->with('notice', 'Artiste <strong>' . $user->id. '</strong> a bien été Modifier');
    }

    public function delete(Request $request)
    {

        $mouve = Mouve::find($request->id);
        $mouve->delete();
        return redirect()->route('home')->with('notice', 'Artiste <strong>' . $mouve->id . '</strong> a été supprimé');

    }
//        $request->validate(
//            ['nom' => 'required | max:50',
//                'url_video' => 'required',
//                'description' => 'required | max:200',
//                'lien_facebook' => 'required',
//                'lien_instagram' => 'required',
//                'photo_principale' => 'required|image|max:1999']
//        );
//        if ($request->hasFile('photo_principale')) {
//
//            //Recuperer le nom de l'image saisi par l'utilisateur
//            $fileName = $request->file('photo_principale')->getClientOriginalName();
//
//            //Telechargement de l'image
//            $request->file('photo_principale')->storeAs('public/uploads', $fileName);
//
//            $img = Image::make($request->file('photo_principale')->getRealPath());
//
//            //Dimensionner l'image
//            $img->resize(400, 400);
//
//            // Imprimer l'icon sur l'image
//            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);
//
//            $img->save('storage/uploads/' . $fileName);
//        }
//
//
//        $artiste_recommande = new Artiste_recommande();
//        $artiste_recommande->id = $request->id;
//        $artiste_recommande->nom = $request->nom;
//        $artiste_recommande->description = $request->description;
//        $artiste_recommande->lien_facebook = $request->lien_facebook;
//        $artiste_recommande->lien_instagram = $request->lien_instagram;
//        $artiste_recommande->photo_principale = $fileName;
//        $artiste_recommande->save();
//
//        $media_recommande = new Media_recommande();
//        $media_recommande->id = $request->id;
//        $media_recommande->url_video = $request->url_video;
//        $media_recommande->description = $request->description;
//        $media_recommande->save();
//
//
////        if ($request->artistes) {
////            foreach ($request->artistes as $id) {
////                $artiste->artistes()->attach($id);
////            }
////        }
////
////        if ($request->mouves) {
////            foreach ($request->mouves as $id) {
////                $mouve->mouves()->attach($id);
////            }
////       }
//        return redirect()->route('backend_admin')->with('notice', 'Artiste <strong>' . $artiste_recommande->nom . '</strong> a bien été ajouté');
//    }
//
//
//    //  Modification artistes recommandés dejà enregistrer
//    public function edit(Request $request)
//    {
//        $artiste_recommande = Artiste_recommande::find($request->id);
//        $media_recommande = Media_recommande::find($request->id);
//
//        return view('backend.admin_edit', [
//
//            'artiste_recommande' => $artiste_recommande,
//            'media_recommande' => $media_recommande,
//
//        ]);
//    }
//
//    // Validation de la modification
//    public function update(Request $request)
//    {
//        $artiste_recommande = Artiste_recommande::find($request->id);
//        $media_recommande = Media_recommande::find($request->id);
//
//        $request->validate(
//            ['nom' => 'required | max:50',
//                'url_video' => 'required',
//                'description' => 'required | max:200',
//                'lien_facebook' => 'required',
//                'lien_instagram' => 'required',
//                'photo_principale' => 'required|image|max:1999']
//        );
//        if ($request->hasFile('photo_principale')) {
//
//            //Recuperer le nom de l'image saisi par l'utilisateur
//            $fileName = $request->file('photo_principale')->getClientOriginalName();
//
//            //Telechargement de l'image
//            $request->file('photo_principale')->storeAs('public/uploads',$fileName);
//
//            $img = Image::make($request->file('photo_principale')->getRealPath());
//
//            //Dimensionner l'image
//            $img->resize(400, 400);
//
//            // Imprimer l'icon sur l'image
//            $img->insert(public_path('img/icon/logo_color.png'), 'bottom-right', 5, 5);
//
//            $img->save('storage/uploads/' .$fileName);
//
//        }
//
//        $artiste_recommande->id = $request->id;
//        $artiste_recommande->nom = $request->nom;
//        $artiste_recommande->description = $request->description;
//        $artiste_recommande->lien_facebook = $request->lien_facebook;
//        $artiste_recommande->lien_instagram = $request->lien_instagram;
//        $artiste_recommande->photo_principale = $fileName;
//        $artiste_recommande->save();
//
//
//        $media_recommande->id = $request->id;
//        $media_recommande->url_video = $request->url_video;
//        $media_recommande->description = $request->description;
//        $media_recommande->save();
//        return redirect()->route('shop_admin')->with('notice', 'Artiste <strong>' . $artiste_recommande->nom . '</strong> a bien été Modifier');
//    }
//
//    public function delete(Request $request)
//    {
//        $artiste_recommande = Artiste_recommande::find($request->id);
//        $media_recommande = Media_recommande::find($request->id);
//        $artiste_recommande->delete();
//        $media_recommande->delete();
//        return redirect()->route('shop_admin')->with('notice', 'Artiste <strong>' . $artiste_recommande->nom . '</strong> a été supprimé');
//
//    }

}
