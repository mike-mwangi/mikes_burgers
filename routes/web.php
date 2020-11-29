<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-burgers')->group(function () {
    Route::resource('/burgers', 'BurgerController');
    Route::get('/burgers', 'BurgerController@create');
    Route::post('/addBurger', 'BurgerController@addBurger');
    Route::get('/viewBurger', 'BurgerController@index');
});

Route::get('/add-to-cart/{burger}', 'CartController@edit')->name('cart.edit')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{burgerId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{burger}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');


Route::resource('/orders', 'OrderController')->middleware('auth');



Route::get('/admin', 'Admin\DashboardController@resources', function () {
    return view('admin.dashboard');
});
