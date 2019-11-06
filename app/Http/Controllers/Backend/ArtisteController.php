<?php

namespace App\Http\Controllers\Backend;

use App\Artiste;
use App\Artiste_recommande;
use App\Http\Controllers\Controller;
use App\Media_recommande;
use App\Mouve;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ArtisteController extends Controller
{
    public function index(){

        return view('backend.index');

    }
    public function store(Request $request)
    {
        $request->validate(
            ['nom' => 'required | max:100',
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
            // Imprimer l'icon sur l'image
            $img = Image::make($request->file('photo_principale')->getRealPath());
            $img->resize(400, 400);
            $img->insert(public_path('img/icon/logo.png'), 'bottom-right', 5, 5);

            $img->save('storage/uploads/' .$fileName);

         }

        $artiste = new Artiste();
        $artiste->id =$request->id;
        $artiste->nom = $request->nom;
        $artiste->description = $request->description;
        $artiste->lien_facebook = $request->lien_facebook;
        $artiste->lien_instagram = $request->lien_instagram;
        $artiste->photo_principale = $fileName;
        $artiste->save();

        $mouve = new Mouve();
        $artiste->id =$request->id;
        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
        $mouve->save();


        if ($request->artistes) {
            foreach ($request->artistes as $id) {
                $artiste->artistes()->attach($id);
            }
        }

        if ($request->mouves) {
            foreach ($request->mouves as $id) {
                $mouve->mouves()->attach($id);
            }


        }
        return redirect()->route('home')->with('notice', 'Artiste <strong>' . $artiste->nom . '</strong> a bien été ajouté');
    }


}
