<?php

namespace App\Http\Controllers\Shop;


use App\Categorie;
use App\Commentaire;
use App\Country;
use App\Http\Controllers\Controller;
use App\Mouve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Comment;

class ProcessController extends Controller
{
    // Création de compte
    public function enregistrer()
    {
        return view('auth.register');
    }


    // Affichage de l'interface administrateur
    public function admin()
    {
        $user = User::all();
        $mouve = DB::table('mouves')
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('backend.admin_gestion', ['users' => $user, 'mouves' => $mouve]);
    }



    //  Modification de musique dejà enregistrer dans la base de données
    public function edit(Request $request)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);
        $categorie = Categorie::all();
        $countrie = Country::all();

        return view('backend.admin_edit', [
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
                'description' => 'required | max:200',
                'lien_facebook' => 'required',
                'lien_instagram' => 'required',
                'countrie_id'=> 'required',
                'categories'=> 'required',
//               'photo_principale' => 'required|image|max:1999'
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
        $mouve->is_online = $request->is_online;

        if ($request->is_online == 1) {
            $mouve->is_online = $request->is_online;
        } else {
            $mouve->is_online = false;
        }


        $mouve->save();
        $mouve->categories()->sync($request->categories);

        return redirect()->route('shop_admin')->with('notice','La Musique a bien été modifié');
    }

    public function delete(Request $request)
    {
        $mouve = Mouve::find($request->id);
        $mouve->delete();
        return redirect()->route('shop_admin')->with('notice','La Musique a bien été supprimé');

    }




}
