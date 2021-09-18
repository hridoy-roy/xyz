<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Models\Customers;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

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
Route::get('/customer/delete/{id}', [RegController::class, 'delete'])->name('customers.delete');
Route::get('/customer/edit/{id}', [RegController::class, 'edit'])->name('customers.edit');
Route::post('/customer/update/{id}', [RegController::class, 'update'])->name('customers.update');
Route::get('/customer', [RegController::class, 'view']);

// Accessign Session Data 
Route::get('accessing-session-data', function () {

    $value = session()->all();
    p($value);

});
// store Sesstion Data
Route::get('store-sesstion-data',function(Request $request){
    $request->session()->put('name', 'Hridoy');
    $request->session()->put('id','1341');
    $request->session()->flash('status','Success');
    return redirect('accessing-session-data');
});
// Delete Sesstion Data 
Route::get('delete-session-data',function(Request $request){
    $request->session()->forget('name');
    return redirect('accessing-session-data');
});