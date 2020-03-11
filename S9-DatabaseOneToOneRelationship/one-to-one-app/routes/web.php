<?php

use Illuminate\Support\Facades\Route;
use App\Model\User;
use App\Model\Address;

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

Route::get('/insert/address', function() {
    $user = User::findOrFail(1);

    $address = Address::create(['address'=>'1234 Houston av NY NY 11218']);

    $user->address()->save($address);

    return $user;
});

Route::get('/update/address', function() {
    $address = Address::where('user_id', 1)->first();
    $address->address = "4353 Update AV, Alaska";
    $address->save();

    return $address;
});

Route::get('/read/address', function() {
    $address = Address::findOrFail(1);

    return $address;
});

Route::get('/delete/address', function() {
    $user = User::findOrFail(1);
    $user->address()->delete();

    return $user;
});
