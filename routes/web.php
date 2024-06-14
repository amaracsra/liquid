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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['guest']], function(){
    Route::get("/", "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");

});

Route::group(['middleware' => ['auth']], function(){
    Route::get("/user", "PageController@formedituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/logout", "AuthController@ceklogout");
    Route::get("/home", "PageController@home");
    Route::get("/drink", "PageController@drink")->middleware('auth');
    Route::get("/messages", "PageController@messages");
    Route::get("/settings", "PageController@settings");
    Route::get("/drink/add-form", "PageController@formadddrink");
    Route::post("/save", "PageController@savedrink");
    Route::get("/drink/edit-form/{id}", "PageController@formeditdrink");
    Route::put("/update/{id}", "PageController@updatedrink");
    Route::get("/delete/{id}", "PageController@deletedrink");
});
