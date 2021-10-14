<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});
Route::get('/image/{filename}', 'ApplicationController@image');
Route::get('/{any}', 'ApplicationController@index')->where('any', '.*');
