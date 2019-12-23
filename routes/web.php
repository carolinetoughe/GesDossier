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

use App\Http\Controllers\AnalyseController;
use Illuminate\Support\Facades\Route;

// Route::get('/w', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@accueil');

Route::get('/compter', 'HomeController@compter');


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// Route::get('/accueil', function () {
//     return view('patient\welcome');
// });

Route::get('patient/home', 'PatientsController@index')->name('patient.home');
// Route::delete('posts/{id}', 'PostController@destroy')->name('post-delete');

Route::get('patient/login', 'Patient\LoginController@showLoginForm')->name('patient.login');
Route::post('patient/login', 'Patient\LoginController@login');

Route::post('patient-password/email','Patient\ForgotPasswordController@sendResetLinkEmail')->name('patient.password.email');
Route::get('patient-password/reset','Patient\ForgotPasswordController@showLinkRequestForm')->name('patient.password.request');
Route::post('patient-password/reset','Patient\ResetPasswordController@reset');
Route::get('patient-password/reset/{token}','Patient\ResetPasswordController@showResetForm')->name('patient.password.reset');

Route::get('patient/create', 'PatientsController@create')->name('patient.create');
Route::post('patient/create', 'PatientsController@store');

Route::get('patient/index', 'PatientsController@liste')->name('patient.liste');

Route::get('patient/show', 'PatientsController@show')->name('patient.show');

Route::get('patient/edit', 'PatientsController@edit')->name('patient.edit');
Route::post('patient/edit', 'PatientsController@update');

Route::get('patient/editinfo', 'PatientsController@editinfo')->name('patient.editinfo');
Route::get('patient/consultationindex', 'ConsultationController@consultationindex')->name('patient.consultationindex');
Route::get('patient/consultationshow/{id}', 'ConsultationController@consultationshow')->name('patient.consultationshow');

Route::get('user/rdvshow/{id}', 'RdvController@rdvshowu')->name('user.rdvshow');
Route::get('user/rdvindex', 'RdvController@rdvindexu')->name('user.rdvindex');
Route::get('user/editinfo', 'UserController@editinfo')->name('user.editinfo');

Route::get('patient/rdvshow/{id}', 'RdvController@rdvshowp')->name('patient.rdvshow');
Route::get('patient/rdvindex', 'RdvController@rdvindexp')->name('patient.rdvindex');


Route::post('/markAsRead','RdvController@markAsRead')->name('markAsRead');
Route::get('patient/ordonnanceindex', 'OrdonnanceController@rdvindex')->name('patient.ordonnanceindex');
Route::get('/readRdv/{rdv_id?}','RdvController@readrdv')->name('readRdv');


Route::get('patient/ficheanalyseindex', 'FicheanalyseController@ficheanalyseindex')->name('patient.ficheanalyseindex');
Route::get('patient/ficheanalyseshow/{id}', 'FicheanalyseController@ficheanalyseshow')->name('patient.ficheanalyseshow');

Route::resource('patient','PatientsController');
Route::resource('antecedents','AntecedentController');

Route::get('/patient/{rdv}/create', 'RdvController@createp')->name('createp');
Route::post('/patient/{rdv}/create', 'RdvController@store');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('services', 'ServiceController');
    Route::resource('consultations','ConsultationController');
    Route::resource('disponibilites','DisponibiliteController');
    Route::resource('analyses','AnalyseController');
    Route::resource('ficheanalyses','FicheanalyseController');
    Route::resource('rdvs','RdvController');
    Route::resource('ordonnances','OrdonnanceController');



    Route::get('/ficheanalyse/{consultation}/create', 'FicheanalyseController@createFiche')->name('create_fiche');
    Route::post('/ficheanalyse/{consultation}/create', 'FicheanalyseController@store');

    Route::name ('notification.')->prefix('notification')->group(function () {
        Route::name ('index')->get ('/', 'NotificationController@index');
        Route::name ('update')->patch ('{notification}', 'NotificationController@update');

    });
});
