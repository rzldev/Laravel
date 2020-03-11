<?php

use Illuminate\Support\Facades\Route;
use App\Model\user;
use App\Model\Post;

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

Route::get('/create/user', function() {
    $user = User::create(['name'=>'rzldev', 'email'=>'rzldev@gmail.com', 'password'=>'1234568']);

    return $user;
});

Route::get('/create/post', function() {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'Laravel Post', 'content'=>'This is my Laravel post']);
    $user->posts()->save($post);

    return $user;
});

Route::get('/read/post', function() {
    $user = User::findOrFail(1);
    // dd($user);

    return $user->posts;
});

Route::get('/update/post', function(){
    $user = User::findOrFail(1);
    $user->posts()->where('id', 2)->update(['title'=>'Javascript Post', 'content'=>'Javasript post updated']);

    return $user;
});

Route::get('/delete/post', function() {
    $user = User::findOrFail(1);
    $user->posts()->where('id', 2)->delete();

    return $user;
});
