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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//rout page d'accueil
Route::get('/home', 'HomeController@index')->name('home');



//route CRUD pour les users
Route::get('/listUser', 'UtilisateurController@listUser')->name('list_user');

Route::get('/edit/{id}', 'UtilisateurController@edit')->name('user_edit');

Route::get('/users/create', 'UtilisateurController@create')->name('user_create');

Route::post('/users/add', 'UtilisateurController@add')->name('add_user');

Route::get('/users/show/{id}', 'UtilisateurController@show')->name('user_show');


Route::post('/utilisateur/update', 'UtilisateurController@update')->name('update_user');

Route::get('/deleteUser', 'UtilisateurController@destroy')->name('deleteUser');


// route pour la deconnexion
Route::get('/logout','Auth\LoginController@logout');



//route CRUD pour les niveaux
Route::resource('niveaux','NiveauController');
Route::get('/deletNiveau', 'NiveauController@destroy')->name('delete_Niveau');





//Route CRUD  Etudiant
Route::get('/etudiant/create', 'EtudiantController@create')->name('etudiant_create');
Route::get('/etudiant/edit/{id}', 'EtudiantController@edit')->name('etudiant_edit');
Route::post('/etudiant/add', 'EtudiantController@add')->name('etudiant_add');
Route::post('/etudiant/update', 'EtudiantController@update')->name('etudiant_update');
Route::get('/etudiant/delete/{id}', 'EtudiantController@delete')->name('etudiant_delete');
Route::get('/etudiant/show/{id}', 'EtudiantController@show')->name('etudiant_show');


Route::get('/etudiant/index', 'EtudiantController@index')->name('list_etudiant');
