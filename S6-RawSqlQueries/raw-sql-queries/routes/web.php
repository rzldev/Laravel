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

Route::get("/insert", function() {
    $inserted = DB::insert("insert into posts(title, content) values(?, ?)", ["PHP with Laravel", "Laravel is the best thing that has happened to PHP"]);

    return $inserted;
});

Route::get("/read/{params}", function($params) {
    $results = DB::select("select * from posts where id = ?", [1]);

    if ($params === "title") {
      foreach($results as $post) {
          return $post->title;
      }
    } else if ($params === "queries") {
      return $results;
    } else if ($params === "dump") {
      return var_dump($results);
    }

});

Route::get("/update", function() {
    $updated = DB::update('update posts set title="Updated title" where id=?', [1]);

    return $updated;
});

Route::get("/delete", function() {
    $deleted = DB::delete('delete from posts where id=?', [2]);

    return $deleted;
});
