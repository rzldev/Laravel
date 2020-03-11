<?php

use Illuminate\Support\Facades\Route;
use App\Model\Post;
use App\Model\User;
use App\Model\Country;
use App\Model\Photo;
use App\Model\Tag;

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

Route::get("/create-user", function() {
    $user = User::create(['name'=>'Patrick', 'email'=>'patrick@gmail.com', 'password'=>'stars']);

    return $user;
});

Route::get("/create-post", function() {
    $post = Post::create(['user_id'=>1, 'title'=>'First Post', 'content'=>'This is my first Laravel post']);

    return $post;
});

Route::get("/user/post/{id}", function($id) {
    $user = User::find($id)->post;

    return $user;
});

Route::get("/post/{id}/user", function($id) {
    $post = Post::find($id)->user;

    return $post;
});

Route::get("/posts", function() {
    $user = User::find(1);

    return $user->posts;
});

Route::get("/user/{id}/role", function($id) {
    $user = User::find($id);

    return $user->roles;
});

Route::get("/user/pivot", function() {
    $user = User::find(1);

    foreach ($user->roles  as $role) {
        return $role->pivot;
    }
});

Route::get('/user/country', function() {
    $country = Country::find(1);

    foreach($country->posts as $post) {
      echo $post->title.'<br>';
    }
});

Route::get('/user/{id}/photo', function($id) {
    $user = User::find($id);

    foreach($user->photos as $photo) {
      return $photo;
    }
});

Route::get('/post/{id}/photo', function($id) {
    $post = Post::find($id);

    foreach($post->photos as $photo) {
      return $photo;
    }
});

Route::get('/photo/{id}', function($id) {
    $photo = Photo::findOrFail($id);
    $imageable = $photo->imageable;
    return $imageable;
});

Route::get('/post/tag', function() {
    $post = Post::find(1);
    return $post->tags;
});

Route::get('/tag/post', function() {
    $tag = Tag::find(2);
    return $tag->posts;
});
