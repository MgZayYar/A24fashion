<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BackendController;

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

Route::get('dashboard',[BackendController::class, 'index'])->name('dashboard');

Route::resource('categories','backend\CategoryController');
Route::resource('subcategories','backend\SubcategoryController');
Route::resource('brands','backend\BrandController');
Route::resource('items','backend\ItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
