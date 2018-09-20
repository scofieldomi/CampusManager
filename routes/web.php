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



//Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

Auth::routes();
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

Route::get('/cycle/index', [

    'uses' => 'cycleController@index',

    'as'   => 'cycle.index'
]);


Route::post('/cycle/store', [

    'uses' => 'cycleController@store',

    'as'   => 'cycle.store'
]);


Route::get('/filiere/index', [

    'uses' => 'filiereController@index',

    'as'   => 'filiere.index'
]);


Route::post('/filiere/store', [

    'uses' => 'filiereController@store',

    'as'   => 'filiere.store'
]);


Route::get('/semestre/index', [

    'uses' => 'semestreController@index',

    'as'   => 'semestre.index'
]);


Route::post('/semestre/store', [

    'uses' => 'semestreController@store',

    'as'   => 'semestre.store'
]);

Route::get('/session/index', [

    'uses' => 'sessionController@index',

    'as'   => 'session.index'
]);

Route::post('/session/store', [

    'uses' => 'sessionController@store',

    'as'   => 'session.store'
]);


Route::get('/uv/index', [

    'uses' => 'uvController@index',

    'as'   => 'uv.index'
]);

Route::post('/uv/store', [

    'uses' => 'uvController@store',

    'as'   => 'uv.store'
]);


Route::get('/module/index', [

    'uses' => 'moduleController@index',

    'as'   => 'module.index'
]);

Route::post('/module/store', [

    'uses' => 'moduleController@store',

    'as'   => 'module.store'
]);

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


Route::get('/pdf/getPDF', [

    'uses' => 'pdfController@getPDF',

    'as'   => 'pdf.getpdf'
]);


Route::post('/deliberation/imprimer', [

    'uses' => 'deliberationController@imprimer',

    'as'   => 'deliberation.imprimer'
]);