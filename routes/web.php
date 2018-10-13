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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware'=>'auth'], function() {

// Début middleware auth

//Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

//Gestion des unités des année

    //Route::post('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/annee/index', [

    'uses' => 'AnneeController@index',

    'as'   => 'annee.index'
]);

Route::post('/annee/store', [

    'uses' => 'AnneeController@store',

    'as'   => 'annee.store'
]);

//Gestion des unités des instituts

Route::get('/institut/index', [

    'uses' => 'institutController@index',

    'as'   => 'institut.index'
]);


Route::post('/institut/store', [

    'uses' => 'institutController@store',

    'as'   => 'institut.store'
]);

//Gestion des unités des departements

Route::get('/departement/index', [

    'uses' => 'departementController@index',

    'as'   => 'departement.index'
]);


Route::post('/departement/store', [

    'uses' => 'departementController@store',

    'as'   => 'departement.store'
]);

//Gestion des unités des cycles


Route::get('/cycle/index', [

    'uses' => 'cycleController@index',

    'as'   => 'cycle.index'
]);


Route::post('/cycle/store', [

    'uses' => 'cycleController@store',

    'as'   => 'cycle.store'
]);

//Gestion des unités des filières

Route::get('/filiere/index', [

    'uses' => 'filiereController@index',

    'as'   => 'filiere.index'
]);


Route::post('/filiere/store', [

    'uses' => 'filiereController@store',

    'as'   => 'filiere.store'
]);

//Gestion des unités des semestres

Route::get('/semestre/index', [

    'uses' => 'semestreController@index',

    'as'   => 'semestre.index'
]);


Route::post('/semestre/store', [

    'uses' => 'semestreController@store',

    'as'   => 'semestre.store'
]);

//Gestion des unités des sessions

Route::get('/session/index', [

    'uses' => 'sessionController@index',

    'as'   => 'session.index'
]);

Route::post('/session/store', [

    'uses' => 'sessionController@store',

    'as'   => 'session.store'
]);

//Gestion des unités de valeur

Route::get('/uv/index', [

    'uses' => 'uvController@index',

    'as'   => 'uv.index'
]);

Route::post('/uv/store', [

    'uses' => 'uvController@store',

    'as'   => 'uv.store'
]);

//Gestion des modules


Route::get('/module/index', [

    'uses' => 'moduleController@index',

    'as'   => 'module.index'
]);

Route::post('/module/store', [

    'uses' => 'moduleController@store',

    'as'   => 'module.store'
]);

//Gestion des étudiants

Route::get('/etudiant/index', [

    'uses' => 'etudiantController@index',

    'as'   => 'etudiant.index'
]);

Route::post('/etudiant/store', [

    'uses' => 'etudiantController@store',

    'as'   => 'etudiant.store'
]);

Route::post('/etudiant/detail', [

    'uses' => 'etudiantController@detail',

    'as'   => 'etudiant.detail'
]);

Route::get('/etudiant/liste', [

    'uses' => 'etudiantController@liste',

    'as'   => 'etudiant.liste'
]);

//Gestion des notes

Route::get('/note/index', [

    'uses' => 'noteController@index',

    'as'   => 'note.index'
]);


Route::post('/note/store', [

    'uses' => 'noteController@store',

    'as'   => 'note.store'
]);

Route::get('/note/rechercheEtudiant', [

    'uses' => 'noteController@rechercheEtudiant',

    'as'   => 'note.rechercheEtudiant'
]);

Route::get('/note/getStudentPagination', [

    'uses' => 'noteController@getStudentPagination',

    'as'   => 'note.getStudentPagination'
]);

Route::get('/notification/{type}/{message}', [

    'uses' => 'sweetController@myNotification',

    'as'   => 'sweet.notification'
]);

//Gestion de la deliberation

Route::get('/deliberation/index', [

    'uses' => 'deliberationController@index',

    'as'   => 'deliberation.index'
]);


Route::post('/deliberation/store', [

    'uses' => 'deliberationController@store',

    'as'   => 'deliberation.store'
]);

Route::get('/deliberation/rechercheResultat', [

    'uses' => 'deliberationController@rechercheResultat',

    'as'   => 'deliberation.rechercheResultat'
]);

//Gestion des impressions

Route::get('/pdf/getPDF', [

    'uses' => 'pdfController@getPDF',

    'as'   => 'pdf.getpdf'
]);


Route::post('/deliberation/impression', [

    'uses' => 'deliberationController@imprimer',

    'as'   => 'deliberation.imprimer'
]);


Route::get('/departement', [

    'uses' => 'rechercheSousElementsController@departement',

    'as'   => 'departement'
]);

// Gestion des enseignants

Route::get('/enseignant/index', [

    'uses' => 'enseignantController@index',

    'as'   => 'enseignant.index'
]);

Route::post('/enseignant/store', [

    'uses' => 'enseignantController@store',

    'as'   => 'enseignant.store'
]);

Route::get('/enseignant/liste/{liste}', [

    'uses' => 'enseignantController@liste',

    'as'   => 'enseignant.liste'
]);

Route::get('/enseignant/module/{id}', [

    'uses' => 'enseignantController@storeModule',

    'as'   => 'enseignant.storeModule'
]);










// Fin du middleware auth

}) ;
