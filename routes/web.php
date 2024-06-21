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
Route::post('/delete-dataMateri/{id}', [DashboardController::class,'deleteMateri']);
Route::post('/updateDataMateri/{id}', [DashboardController::class, 'updateDataMateri']);
Route::post('/addDataMateri', [DashboardController::class, 'addDataMateri']);

// list-holding
Route::get('/list-holding', [DashboardController::class,'indexListHolding']);
Route::post('/delete-dataHolding/{id}', [DashboardController::class,'deleteHolding']);
Route::post('/updateDataHolding/{id}', [DashboardController::class, 'updateDataHolding']);
Route::post('/addDataHolding', [DashboardController::class, 'addDataHolding']);

// list-agency
Route::get('/list-agency', [DashboardController::class,'indexListAgency']);
Route::post('/delete-dataAgency/{id}', [DashboardController::class,'deleteAgency']);
Route::post('/updateDataAgency/{id}', [DashboardController::class, 'updateDataAgency']);
Route::post('/addDataAgency', [DashboardController::class, 'addDataAgency']);

// list-advertiser
Route::get('/list-advertiser', [DashboardController::class,'indexListAdvertiser']);
Route::post('/delete-dataAdvertiser/{id}', [DashboardController::class,'deleteAdvertiser']);
Route::post('/updateDataAdvertiser/{id}', [DashboardController::class, 'updateDataAdvertiser']);
Route::post('/addDataAdvertiser', [DashboardController::class, 'addDataAdvertiser']);

// list-brand
Route::get('/list-brand', [DashboardController::class,'indexListBrand']);
Route::post('/delete-dataBrand/{id}', [DashboardController::class,'deleteBrand']);
Route::post('/updateDataBrand/{id}', [DashboardController::class, 'updateDataBrand']);
Route::post('/addDataBrand', [DashboardController::class, 'addDataBrand']);

// list flagrate
Route::get('/list-flagrate', [DashboardController::class,'indexListFlagrate']);
Route::post('/delete-dataFlagrate/{id}', [DashboardController::class,'deleteFlagrate']);
Route::post('/updateDataFlagrate/{id}', [DashboardController::class, 'updateDataFlagrate']);
Route::post('/addDataFlagrate', [DashboardController::class, 'addDataFlagrate']);

// list-spottype
Route::get('/list-spottype', [DashboardController::class,'indexListSpottype']);
Route::post('/delete-dataSpottype/{id}', [DashboardController::class,'deleteSpottype']);
Route::post('/updateDataSpottype/{id}', [DashboardController::class, 'updateDataSpottype']);
Route::post('/addDataSpottype', [DashboardController::class, 'addDataSpottype']);

// channel
Route::get('/list-channel', [DashboardController::class,'indexListChannel']);
Route::post('/delete-dataChannel/{id}', [DashboardController::class,'deleteChannel']);
Route::post('/updateDataChannel/{id}', [DashboardController::class, 'updateDataChannel']);
Route::post('/addDataChannel', [DashboardController::class, 'addDataChannel']);

// Category
Route::get('/list-category', [DashboardController::class,'indexListCategory']);
Route::post('/delete-dataCategory/{id}', [DashboardController::class,'deleteCategory']);
Route::post('/updateDataCategory/{id}', [DashboardController::class, 'updateDataCategory']);
Route::post('/addDataCategory', [DashboardController::class, 'addDataCategory']);

// settings
Route::get('/list-settings', [DashboardController::class,'indexListSettings']);
Route::post('/delete-dataSettings/{id}', [DashboardController::class,'deleteSettings']);
Route::post('/updateDataSettings/{id}', [DashboardController::class, 'updateDataSettings']);
Route::post('/addDataSettings', [DashboardController::class, 'addDataSettings']);