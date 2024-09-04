<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/list', function () { return view('layouts.list'); });
Route::get('/form', function () { return view('layouts.form'); });
