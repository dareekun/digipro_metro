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
    return redirect('/dashboard');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Verify Mail Register Routes...
]);

Route::get('/dashboard', function () {return view('home');})->middleware('auth')->name('home');

Route::get('/status_lotcard', function() {return view('prod.status_lot');})->middleware('auth')->name('status_job');
Route::get('/lotcard_scanned', function() {return view('prod.lot_scan');})->middleware('auth')->name('job_scanned');
Route::get('/inprogress_data', function() {return view('quality.progress_data');})->middleware('auth')->name('in_progress');
Route::get('/finish_data', function() {return view('quality.finish_data');})->middleware('auth')->name('finish_production');
Route::get('/moveable_data', function() {return view('warehouse.move_data');})->middleware('auth')->name('moveable_product');
Route::get('/history_transaction', function() {return view('warehouse.transact_history');})->middleware('auth')->name('history_transact');

Route::get('/routing_control', function() {return view('admin.routing_control');})->middleware('auth')->name('routing_control');
Route::get('/product_control', function() {return view('admin.product_control');})->middleware('auth')->name('product_control');
Route::get('/user_control', function() {return view('admin.user_control');})->middleware('auth')->name('user_control');
Route::get('/log_record', function() {return view('admin.log_record');})->middleware('auth')->name('log_record');
Route::get('/change_password', function() {return view('admin.change_password');})->middleware('auth')->name('change_password');

