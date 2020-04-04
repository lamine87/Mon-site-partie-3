<?php

namespace App\Http\Controllers\Shop;


use App\Artiste_recommande;
use App\Categorie;
use App\Commentaire;
use App\Country;
use App\Http\Controllers\Controller;
use App\Media_recommande;
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


//     //Enregistrement de musique dans la base de données pour administrateur
//    public function store(Request $request)
//    {
//        $user = Auth::user();
//
//
//        $request->validate(
//            [
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
//        $user->lien_facebook = $request->lien_facebook;
//        $user->lien_instagram = $request->lien_instagram;
//        $user->save();
//
//        $mouve = new Mouve();
//        $mouve->url_video = $request->url_video;
//        $mouve->description = $request->description;
//        $mouve->photo_principale = $fileName;
//        $mouve->user_id = $user->id;
//        $mouve->save();
//
//
//        return redirect()->route('shop_admin')->with('notice', 'Artiste <strong>' . $user->id . '</strong> a bien été ajouté');
//    }


    //  Modification de musique dejà enregistrer
    public function edit(Request $request)
    {
        $user = Auth::user();
        $mouve = Mouve::find($request->id);
        return view('backend.admin_edit', ['user' => $user, 'mouve' => $mouve]);
    }


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

        $mouve->url_video = $request->url_video;
        $mouve->description = $request->description;
        $mouve->photo_principale = $fileName;
        $mouve->save();
        return redirect()->route('shop_admin')->with('notice', 'Artiste <strong>' . $user->nom . '</strong> a bien été Modifier');
    }

    public function delete(Request $request)
    {

        $mouve = Mouve::find($request->id);
        $mouve->delete();
        return redirect()->route('shop_admin')->with('notice', 'Artiste <strong>' . $mouve->id . '</strong> a été supprimé');


    }


//    public function store(Request $request){
//        $mouve = Mouve::find($request->id);
//        $request->validate(
//            [
//                'nom'=>'required',
//                'email'=>'required',
//                'texte'=>'required|max:200']
//        );
//
//        $commentaire = new Commentaire();
//        $commentaire->nom = $request->nom;
//        $commentaire->email = $request->email;
//        $commentaire->texte = $request->texte;
//
//        $commentaire->mouve_id = $mouve->id;
//        $commentaire->save();
//
//
//        return redirect()->route('voir_artiste')->with('notice', 'Musique <strong>' .$commentaire->id. '</strong> a bien été Modifier');
//
//    }


//    public function store(Request $request)
//    {
////        $mouve = Mouve::find($request->id);
//        $request->validate(
//            [
////                'nom'=>'required',
////                'email'=>'required',
//                'texte' => 'required|max:200']
//        );
//        $comment = new Comment();
//        $comment->nom = $request->nom;
//        $comment->email = $request->email;
//        $comment->texte = $request->texte;
//
////        $comment->mouve_id = $mouve->id;
//
//        $comment->save();
//
//        return redirect()->route('voir_artiste')->with('notice', 'Musique <strong>' .$comment->id. '</strong> a bien été Modifier');
//    }




//    public function voirCategorie(Request $request){
//
//        $user = User::all();
//
//        $countrie = Country::all();
//
//        $categorie = Categorie::find($request->id);
//
//        $test = DB::table('categorie_mouves')
//            ->join('mouves', 'mouves.id', '=',
//                'categorie_mouves.mouve_id')
//            ->join('categories', 'categories.id', '=',
//                'categorie_mouves.categorie_id')
//            ->select('categorie_mouves.*','mouves.*', 'categories.*')->get();
//
//
////        $mouve = DB::table('categorie_mouves')->where('mouve_id', '=',$cat->categorie_id)->orderBy('created_at', 'desc')->paginate(12);
//
//        return view('shop.categorie', ['users'=>$user,'mouves'=>$test,'categories'=>$categorie,'countries'=>$countrie]);
//    }



}
