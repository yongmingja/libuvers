<?php

use Illuminate\Support\Facades\Route;
use Modules\Library\Http\Controllers\LibraryBookBookController;
use Modules\Library\Http\Controllers\LibraryController;
use Modules\Library\Models\LibraryBookBook;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('books', LibraryBookBookController::class)->names('books')->except('show');
});
