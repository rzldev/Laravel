<?php

use Illuminate\Support\Facades\Route;
use App\Model\Staff;
use App\Model\Product;
use App\Model\Photo;

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

Route::get('/create/product', function() {
    $product1 = Product::create(['name'=>'Laravel Course']);
    $product2 = Product::create(['name'=>'PHP Course']);

    return ([$product1, $product2]);
});

Route::get('/create/staff', function() {
    $staff1 = Staff::create(['name'=>'Spongebob']);
    $staff2 = Staff::create(['name'=>'Patrick']);

    return ([$staff1, $staff2]);
});

Route::get('/create/photo/staff', function() {
    $staff1 = Staff::findOrFail(1);
    $staff1->photos()->create(['path'=>'spongebob.jpg']);

    $staff2 = Staff::findOrFail(2);
    $staff2->photos()->create(['path'=>'patrick.jpg']);

    return ([$staff1, $staff2]);
});

Route::get('/read/photo/staff', function() {
    $staff = Staff::findOrFail(1);

    return $staff->photos;
});

Route::get('/update/photo/staff', function() {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->where('id', 1)->first();
    $photo->path = 'spongebob-updated.jpg';
    $photo->save();

    return $photo;
});

Route::get('/delete/photo/staff', function() {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->where('id', 1)->first();
    $photo->delete();

    return $photo;
});

Route::get('assign/photo/staff', function() {
    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFail(3);
    $staff->photos()->save($photo);

    return $staff;
});

Route::get('unassign/photo/staff', function() {
    $staff = Staff::findOrFail(1);
    $staff->photos()->where('id', 3)->update(['imageable_id'=>0, 'imageable_type'=>'']);

    return $staff;
});
