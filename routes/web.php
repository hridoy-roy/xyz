<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Models\Customers;

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

Route::get('/',[RegController::class, 'home']);
// Route::post('/register',[RegController::class, 'reg']);
Route::get('/register',[RegController::class, 'customer']);
Route::post('/customer',[RegController::class, 'reg']);//submit
Route::get('/customer/create',[RegController::class, 'customer'])->name('customaes.create');

Route::get('/customer', [RegController::class, 'view']);

