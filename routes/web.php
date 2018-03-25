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

//Route::get('/', function() {
//    return view('welcome');
//})->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Dashboard')->name('dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index');

    Route::namespace('Profile')->name('.profile')->prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@index');
//        Route::get('edit', 'ProfileController@edit')->name('.edit');
        Route::match(['put', 'patch'], 'update', 'ProfileController@update')->name('.update');
    });
});

Route::namespace('Enterprise')->name('enterprise')->group(function () {
    Route::get('enterprise/create', 'RegisterController@create')->name('.create');
    Route::post('enterprise/store', 'RegisterController@store')->name('.store');

    Route::get('enterprise/{enterprise}', 'ManageController@show')->name('.show');
    Route::post('enterprise/invite', 'ManageController@invitePeople')->name('.invite');
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