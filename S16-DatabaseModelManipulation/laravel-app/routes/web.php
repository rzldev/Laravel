<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Model\User;

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

Route::group(['middleware'=>'web'], function() {
    Route::resource('/posts', 'PostsController');

    Route::get('/dates', function() {
        $date = new DateTime('+1 week');

        echo $date->format('m-d-Y');

        echo '<br>';

        echo Carbon::now();

        echo '<br>';

        echo Carbon::now()->diffForHumans();

        echo '<br>';

        echo Carbon::now()->addDays(10)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->subMonths(5)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->yesterday()->diffForHumans();

        echo '<br>';

        echo Carbon::now()->yesterday();
    });

    Route::get('/getName', function() {
        $user = User::findOrFail(1);

        echo $user->name;
    });

    Route::get('/setName', function() {
        $user = User::findOrFail(2);
        $user->name = 'ben simmons';
        $user->save();

        return $user;
    });
});
