<?php

use Illuminate\Support\Facades\Route;
use App\Model\Role;
use App\User;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', function() {
    $role1 = Role::create(['name'=>'Administrator']);
    $role2 = Role::create(['name'=>'Subscriber']);

    return [$role1, $role2];
});

Route::group(['middleware'=>'admin'], function() {
    Route::resource('/admin', 'AdminController');

    Route::resource('/posts', 'PostController');

    Route::resource('/categories', 'CategoryController');

    Route::resource('/media', 'MediaController');

    Route::resource('/comments', 'CommentController');

    Route::get('post/{id}', 'PostController@post')->name('home.post');

    Route::resource('/replies', 'CommentReplyController');
});
