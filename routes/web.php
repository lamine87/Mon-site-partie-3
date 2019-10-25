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

Route::get('/','Shop\MainController@index')->name('home_shop');

Route::get('/recommandation','Shop\MainController@recommande')->name('artiste_recommande');

Route::get('/voir/artiste/{id}','Shop\MainController@voirArtiste')->name('voir_artiste');

Route::get('/tag/{id}','Shop\MainController@voirTag')->name('voir_tag');

Auth::routes();
               //S'identifier
Route::get('/home', 'HomeController@index')->name('home');

              // Affichage de la page login
           // Affichage de la page creer un compte
Route::get('/enregistrement', 'Shop\ProcessController@enregistrer')->name('enregistrer_user');

Route::get('/backend', 'Shop\ProcessController@back')->name('afficheBackend');

Route::get('/music', 'Shop\ProcessController@ajoute')->name('ajoutMusic');


//Route::get('/compte', 'Auth\LoginController@index')->name('creer_compte');
//
//Route::post('/connexion', 'Auth\LoginController@connect')->name('connect_home');
//
//Route::get('/backend','Backend\ArtisteController@index')->name('backend_home');
//
//Route::get('/affiche','Backend\ArtisteController@affiche')->name('affiche_music');

//Route::post('/affiche','Backend\ArtisteController@affiche')->name('affiche_music');






//Auth::routes(['verify' => true]);




