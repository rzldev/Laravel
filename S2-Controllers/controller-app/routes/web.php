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

Route::get('/', function () {
    return view('welcome');
});

// Create a route with controller
Route::get("/post", "PostsController@index");

// Cretae a route and passing data to controller
Route::get("/post/{id}", "PostsController@IndexNumber");

// Create a route to resource Controller
Route::resource("/resource", "ResourceController");
