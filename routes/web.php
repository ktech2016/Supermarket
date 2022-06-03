<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyfirstController;
use App\Http\Controllers\createController;
use App\Http\Controllers\MenuController;


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
Route::get('/services', function () {
    echo "Our services include Programming and networking.";
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
})->name('rate');

Route::resource('category', createController::class);
Route::resource('menu', MenuController::class);


