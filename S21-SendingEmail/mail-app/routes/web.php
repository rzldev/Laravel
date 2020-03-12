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

Route::get('/mail', function() {
    try {
      $data = [
          'title'=>'Hi',
          'content'=>'I just want to say hi.'
      ];

      $mail = Mail::send('mails.email', $data, function($message) use($data) {
          $message->to('my_mail@gmail.com', 'mail_name')->subject('Hi, nice to know you');
      });
    } catch (Exception $e) {
      return $e;
    }

});
