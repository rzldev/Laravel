<?php

use Illuminate\Support\Facades\Route;
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

Route::get("/read", function() {
    $posts = Post::all();

    return $posts;
});

Route::get("/find", function() {
    $post = Post::find(1);

    return $post;
});

Route::get("/find-where", function() {
    $post = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

    return $post;
});

Route::get("/find-more", function() {
    $post = Post::findOrFail(1);

    return $post;
});

Route::get("/basic-insert", function() {
    $post = new Post;

    $post->title = "New Eloquent title inserted";
    $post->content = "Wow Eloquent is really cool, look at this content";

    $post->save();

    return $post;
});

Route::get("/create", function() {
    $post = Post::create(['title'=>'The created method', 'content'=>'Wow i\'m learning a lot about Laravel']);

    return $post;
});

Route::get("/update", function() {
    $post = Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'New PHP title', 'content'=>'I love Laravel']);

    return $post;
});

Route::get("/delete", function() {
    $post = Post::find(3);
    $post->delete();

    return $post;
});

Route::get("/destroy", function() {
    $post = Post::destroy([4, 5]);

    return $post;
});


Route::get("/soft-delete", function() {
    $post = Post::find(11)->delete();

    return $post;
});

Route::get("/retrieve-soft-delete", function() {
    // $post = Post::withTrashed()->where('id', 7)->get();
    $post = Post::onlyTrashed()->where('id', 6)->get();

    return $post;
});

Route::get("/restore-soft-delete", function() {
    $post = Post::where('is_admin', 0)->restore();

    return $post;
});

Route::get("/permanent-delete", function() {
    $post = Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

    return $post;
});
