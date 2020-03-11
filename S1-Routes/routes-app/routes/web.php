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

// Create a route
Route::get("/hello", function() {
    return "Hello World!";
});

Route::get("/about", function() {
    return "This is about page";
});

Route::get("/contact", function() {
    return "This is contact page";
});

// Create a route with parameters
Route::get("/post/{id}/{name}", function($id, $name) {
    return "This is post number ".$id." ".$name;
});

// Naming a route
Route::get("/admin/posts/example", array("as"=>"admin.home", function() {
    $url = route("admin.home");
    return "This url is ".$url;
}));
