<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return redirect('/');
});


Route::get('/vmm-cron-script', 'App\Http\Controllers\BackEnd\VmmCronScriptController@script')->name('vmm-cron-script');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\BackEnd\DashboardController@index')->name('dashboard');



Route::group(['prefix'=>'admin','middleware'=>['auth:sanctum', 'verified', 'authadmin']],function(){

   Route::get('/dashboard', 'App\Http\Controllers\BackEnd\Admin\DashboardController@index')->name('admin.dashboard');
   Route::get('/vmm-create', 'App\Http\Controllers\BackEnd\Admin\VMMController@create')->name('admin.vmm.create');
   Route::post('/vmm-store', 'App\Http\Controllers\BackEnd\Admin\VMMController@store')->name('admin.vmm.store');

});




//Route::group(['prefix'=>'vendor','middleware'=>['auth:sanctum', 'verified', 'authvendor']],function(){
//
//   Route::get('/dashboard', 'App\Http\Controllers\BackEnd\Vendor\DashboardController@index')->name('vendor.dashboard');
//
//});



Route::group(['prefix'=>'user','middleware'=>['auth:sanctum', 'verified', 'authuser']],function(){

   Route::get('/dashboard', 'App\Http\Controllers\BackEnd\User\DashboardController@index')->name('user.dashboard');
   Route::get('/vmm', 'App\Http\Controllers\BackEnd\User\VMMController@index')->name('user.vmm');

});

