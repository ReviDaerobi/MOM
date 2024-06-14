<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// View

// list-user
Route::get('/list-user', [DashboardController::class,'indexListUser']);
Route::post('/delete-data/{id}', [DashboardController::class,'delete']);
Route::post('/updateData/{id}', [DashboardController::class, 'updateData']);
Route::post('/addData', [DashboardController::class, 'addData']);

// list-materi
Route::get('/list-materi', [DashboardController::class,'indexListMateri']);

// list-holding
Route::get('/list-holding', [DashboardController::class,'indexListHolding']);

// list-agency
Route::get('/list-agency', [DashboardController::class,'indexListAgency']);

// list-advertiser
Route::get('/list-advertiser', [DashboardController::class,'indexListAdvertiser']);

// list-brand
Route::get('/list-brand', [DashboardController::class,'indexListBrand']);

// list flagrate
Route::get('/list-flagrate', [DashboardController::class,'indexListFlagrate']);

// list-spottype
Route::get('/list-spottype', [DashboardController::class,'indexListSpottype']);

// channel
Route::get('/list-channel', [DashboardController::class,'indexListChannel']);

// category
Route::get('/list-category', [DashboardController::class,'indexListCategory']);

// settings
Route::get('/list-settings', [DashboardController::class,'indexListSettings']);