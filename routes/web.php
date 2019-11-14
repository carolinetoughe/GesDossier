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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accueil', function () {
    return view('patient\welcome');
});

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

Route::get('patient/liste', 'PatientsController@liste')->name('patient.liste');

Route::get('patient/show', 'PatientsController@show')->name('patient.show');

Route::get('patient/edit', 'PatientsController@edit')->name('patient.edit');
Route::post('patient/edit', 'PatientsController@update');

Route::get('patient/editinfo', 'PatientsController@editinfo')->name('patient.editinfo');
Route::get('patient/consultationindex', 'ConsultationController@consultationindex')->name('patient.consultationindex');
Route::get('patient/consultationshow/{id}', 'ConsultationController@consultationshow')->name('patient.consultationshow');



Route::resource('patient','PatientsController');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('services', 'ServiceController');
    Route::resource('consultations','ConsultationController');
    Route::resource('disponibilites','DisponibiliteController');
    Route::resource('analyses','AnalyseController');
    Route::resource('ficheanalyses','FicheanalyseController');

    Route::name ('notification.')->prefix('notification')->group(function () {
        Route::name ('index')->get ('/', 'NotificationController@index');
        Route::name ('update')->patch ('{notification}', 'NotificationController@update');
    });
});
