<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','Shop\MainController@index')->name('shop_home');

Route::get('/recommandation/{id}','Shop\MainController@recommande')->name('artiste_recommande');

Route::get('/voir/artiste','Shop\MainController@artiste')->name('voir_artiste');
                     //Affichage du Tag
Route::get('/tag/{id}','Shop\MainController@tag')->name('voir_tag');
                   // Voir titre de l'artiste
Route::get('/titre{id}','Shop\MainController@titre')->name('voir_titre');

        // afficher les categories
//Route::get('/variete/{id}','Shop\MainController@category')->name('categorie_music');

         // voir categorie liée aux mouves
Route::get('/voir/categorie/{id}','Shop\MainController@voirCategorie')->name('voir_categorie');


               // Enregistrement des commentaires
//Route::post('/shop/store{id}','Shop\ProcessController@store')->name('comment_store');



Route::post('/comments','Shop\ProcessController@store');


               /* Moteur de recherche */
//Route::get('/search', ['users' => 'MainController@recherche', 'as' => 'search']);

Route::get('/search','Shop\MainController@recherche')->name('search');


Auth::routes(['verify' => true]);
               //S'identifier
Route::get('/backend', 'HomeController@index')->name('home');

           // Affichage de la page creer un compte
Route::get('/regi', 'Shop\ProcessController@enregistrer')->name('enregistrer_user');


              //Affichage de la page index.blade
Route::get('/music/', 'Backend\ArtisteController@index')->name('ajoutMusic');

           // Insertion de musique dans la base de données
Route::post('/backend/store','Backend\ArtisteController@store')->name('backend_artiste_store');

            // Pour afficher la page d'aide a l'utilisation
Route::get('/music/aide', 'Backend\ArtisteController@aide')->name('aide_utiliser');

           // Editer musique
Route::get('/backend/edit/{id}','Backend\ArtisteController@edit')->name('backend_edit');

               // Valider la modification artiste
Route::post('/backend/update/{id}','Backend\ArtisteController@update')->name('backend_update');

              // Supprimer artiste
Route::get('/backend/delete/{id}','Backend\ArtisteController@delete')->name('backend_delete');


 Route::middleware('auth.admin')->group(function () {
              // Affichage de l'espace administrateur
        Route::get('/shop/admin','Shop\ProcessController@admin')->name('shop_admin');


//        Route::get('/shop/admin','Shop\ProcessController@admin')->name('backend_admin');


               // Affichage de la liste des user dans l'espace administrateur
     Route::get('/shop/liste','Shop\MainController@liste')->name('user_liste');

              // Modifier user
     Route::get('/backend/liste/edit/{id}','Shop\MainController@editListe')->name('backend_liste_edit');

              // Valider la modification de user
     Route::post('/backend/liste/update/{id}','Shop\MainController@update')->name('backend_liste_update');

              // Supprimer user
     Route::get('/backend/banir/{id}','Shop\MainController@bannir')->name('backend_bannir_user');


//              //  Insertion par l'administrateur dans la base de données
//        Route::post('/backend/admin/store','Shop\ProcessController@store')->name('shop_store');


             // Editer musique par l'administrateur
        Route::get('/backend/admin/edit/{id}','Shop\ProcessController@edit')->name('backend_admin_edit');

                           // Valider la modification
        Route::post('/backend/admin/update/{id}','Shop\ProcessController@update')->name('backend_admin_update');

                                       // Supprimer artiste
        Route::get('/backend/admin/delete/{id}','Shop\ProcessController@delete')->name('backend_admin_delete');

});




