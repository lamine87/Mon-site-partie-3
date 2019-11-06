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

Route::get('recommandation{id}','Shop\MainController@recommande')->name('artiste_recommande');

Route::get('voir/artiste/{id}','Shop\MainController@voirArtiste')->name('voir_artiste');
                     //Affichage du Tag
Route::get('tag/{id}','Shop\MainController@tag')->name('voir_tag');

//Route::get('affiche/{id}','Shop\MainController@affiche')->name('afficheTag');





Auth::routes();
               //S'identifier
Route::get('/backend', 'HomeController@index')->name('home');

           // Affichage de la page creer un compte
Route::get('/regi', 'Shop\ProcessController@enregistrer')->name('enregistrer_user');

              //Affichage de la page index.blade
Route::get('music', 'Backend\ArtisteController@index')->name('ajoutMusic');

Route::post('backend/store','Backend\ArtisteController@store')->name('backend_artiste_store');


//Backend



//Route::get('/backend/edit{id}','Backend\ProcessController@edit')->name('backend_edit');
//
//Route::post('/backend/update{id}','Backend\ProcessController@update')->name('backend_edit');
//
//Route::post('/backend/delete{id}','Backend\ProcessController@delete')->name('backend_delete');


//Route::get('/compte', 'Auth\LoginController@index')->name('creer_compte');
//
//Route::post('/connexion', 'Auth\LoginController@connect')->name('connect_home');
//
//Route::get('/backend','Backend\ArtisteController@index')->name('backend_home');
//
//Route::get('/affiche','Backend\ArtisteController@affiche')->name('affiche_music');

//Route::post('/affiche','Backend\ArtisteController@affiche')->name('affiche_music');






//Auth::routes(['verify' => true]);




