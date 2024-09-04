<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/list', function () { return view('list'); });
Route::get('/form', function () { return view('form'); });
