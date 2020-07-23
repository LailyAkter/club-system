<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::middleware('auth')->namespace('Admin')->group(function(){
    Route::get('dashboard','DashboardController@index');
    Route::get('api/getembassy',"DashboardController@getEmbassy");
    Route::get('api/designation/{id}','DashboardController@country');
    Route::get('api/person/{id}',"DashboardController@designation");

    // search
    Route::get('search',"DashboardController@search");

    Route::get('audits', 'AuditController@index');

    Route::resource('country','CountryController');
    Route::get('soft/country','CountryController@soft');
    Route::post('country/restore/{id}','CountryController@restore');

    Route::resource('designation','DesignationController');
    Route::get('soft/designation','DesignationController@soft');
    Route::post('designation/restore/{id}','DesignationController@restore');

    Route::resource('person','PeopleController');
    Route::get('soft/person','PeopleController@soft');
    Route::post('person/restore/{id}','PeopleController@restore');

    Route::get('/profile','SettingController@profile');
    Route::post('/profile/update','SettingController@profileUpdate');
    Route::get('/password/change','SettingController@passwordChange');
    Route::post('change/password','SettingController@changePassword');
});

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


