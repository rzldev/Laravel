<?php

use Illuminate\Support\Facades\Route;
use App\Model\Post;
use App\Model\Video;
use App\Model\Tag;
use App\Model\Taggable;

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

Route::get('/create', function() {
    $tag1 = Tag::create(['name'=>'Laravel']);
    $tag2 = Tag::create(['name'=>'Javascript']);
    $tag3 = Tag::create(['name'=>'PHP']);
    $tag4 = Tag::create(['name'=>'Git']);

    $post1 = Post::create(['title'=>'Laravel Post', 'content'=>'This is my Laravel post.']);
    $post2 = Post::create(['title'=>'Javascript Post', 'content'=>'This is my Javascript post.']);

    $post1->tags()->save($tag1);
    $post2->tags()->save($tag2);

    $video1 = Video::create(['name'=>'video1.mov']);
    $video2 = Video::create(['name'=>'video2.mov']);

    $video1->tags()->save($tag3);
    $video2->tags()->save($tag4);



    return (['Post'=>[$post1, $post2], 'Video'=>[$video1, $video2]]);
});

Route::get('/read', function() {
    $post = Post::findOrFail(1);

    return $post;
});

Route::get('/update', function() {
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag) {
        return $tag->where('name', 'PHP')->update(['name'=>'Updated PHP']);
    }
});

Route::get('/attach', function() {
    $post = Post::findOrFail(1);
    $tag = Tag::findOrFail(3);
    $post->tags()->attach($tag);

    return $post;
});

Route::get('/detach', function() {
    $post = Post::findOrFail(1);
    $tag = Tag::findOrFail(3);
    $post->tags()->detach($tag);

    return $post;
});

Route::get('/sync', function() {
    $post = Post::findOrFail(1);
    $post->tags()->sync([1, 2, 3, 4]);

    return $post;
});

Route::get('/delete', function() {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        $tag->where('id', 2)->delete();
    }

    return $post;
});
