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

Auth::routes();

Route::get('register/finished', 'Auth\RegisterController@finished');
Route::get('register/notify', 'Auth\RegisterController@notifyAgain')->name('register.notify');
Route::get('register/confirm/{email}/{token}', 'Auth\RegisterController@confirm')->name('register.confirm');

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Dashboard')->name('dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index');

    Route::namespace('Profile')->name('.profile')->prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@index');
//        Route::get('edit', 'ProfileController@edit')->name('.edit');
        Route::match(['put', 'patch'], 'update', 'ProfileController@update')->name('.update');
    });
});

Route::resource('skill', 'SkillController');

Route::namespace('Enterprise')->prefix('enterprise')->name('enterprise')->group(function () {
    Route::get('create', 'RegisterController@create')->name('.create');
    Route::post('store', 'RegisterController@store')->name('.store');

    Route::get('{enterprise}', 'ManageController@show')->name('.show');
    Route::post('invite', 'ManageController@invitePeople')->name('.invite');
});

Route::prefix('offer')->name('offer.')->group(function () {
    Route::get('create', 'OfferController@create')->name('create');
    Route::post('store', 'OfferController@store')->name('store');
});

//Route::post('email', function(\Illuminate\Http\Request $request) {
//    $validator = Validator::make($request->all(), [
//            'email' => 'required|unique:emails'
//    ], [
//            'email.unique' => 'Vous vous êtes déjà pré-inscrit'
//    ]);
//
//    if($validator->fails()) {
//        return redirect(route('home'))->withErrors($validator)->withInput();
//    }
//
//    App\Email::create($request->all());
//
//    return redirect(route('home'));
//})->name('register.email');