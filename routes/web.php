<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuchilloController;
use Illuminate\Controllers\HomeController;

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
// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [App\Http\Controllers\PortafolioController::class, 'index']);


Route::get('/leon-admin', function () {
    return view('auth.login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'] )->name('template');

 

Route::resource('cuchillo', CuchilloController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [CuchilloController::class, 'index'])->name('home');



  Route::group(['middleware' => 'auth'], function () {
   
     Route::get('/cuchillo/index', [CuchilloController::class, 'index'])->name('home');
 });
