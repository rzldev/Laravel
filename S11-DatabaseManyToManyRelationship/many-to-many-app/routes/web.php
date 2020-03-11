<?php

use Illuminate\Support\Facades\Route;
use App\Model\User;
use App\Model\Role;

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

Route::get('/create/role', function() {
    $user = User::findOrFail(1);
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);

    return $user;
});

Route::get('/read/role', function() {
    $user = User::findOrFail(1);
    // dd($user);

    return $user->roles;
});

Route::get('/update/role', function() {
    $user = User::findOrFail(1);

    if ($user->has('roles')) {
        foreach($user->roles as $role) {
            if ($role->name === 'Administrator'){
                $role->name = 'Subscriber';
                $role->save();
            }
        }
    }

    return $user;
});

Route::get('/delete/role', function() {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        $role->where('id', 2)->delete();
    }

    return $user;
});

Route::get('/attach/role', function() {
    $user = User::findOrFail(1);
    $user->roles()->attach(2);

    return $user;
});

Route::get('/detach/role', function() {
    $user = User::findOrFail(1);
    $user->roles()->detach(2);

    return $user;
});

Route::get('/sync/role', function() {
    $user = User::findOrFail(1);
    $user->roles()->sync([1, 2]);

    return $user;
});
