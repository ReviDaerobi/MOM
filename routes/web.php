<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

// Login

Route::post('/login', [LoginController::class, 'Login'])->name('login');
Route::get('/test', [DashboardController::class, 'TestDash']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::middleware(['auth'])->group(function () {
// list-user
Route::get('/list-user', [DashboardController::class,'indexListUser'])->name('listUser');
Route::post('/delete-data/{id}', [DashboardController::class,'delete']);
Route::post('/updateData/{id}', [DashboardController::class, 'updateData']);
Route::post('/addData', [DashboardController::class, 'addData']);

// list-materi
Route::get('/list-materi', [DashboardController::class,'indexListMateri'])->name('materi');
Route::post('/delete-dataMateri/{id}', [DashboardController::class,'deleteMateri']);
Route::post('/updateDataMateri/{id}', [DashboardController::class, 'updateDataMateri']);
Route::post('/addDataMateri', [DashboardController::class, 'addDataMateri']);

// list-holding
Route::get('/list-holding', [DashboardController::class,'indexListHolding'])->name('holding');
Route::post('/delete-dataHolding/{id}', [DashboardController::class,'deleteHolding']);
Route::post('/updateDataHolding/{id}', [DashboardController::class, 'updateDataHolding']);
Route::post('/addDataHolding', [DashboardController::class, 'addDataHolding']);

// list-agency
Route::get('/list-agency', [DashboardController::class,'indexListAgency'])->name('agency');
Route::post('/delete-dataAgency/{id}', [DashboardController::class,'deleteAgency']);
Route::post('/updateDataAgency/{id}', [DashboardController::class, 'updateDataAgency']);
Route::post('/addDataAgency', [DashboardController::class, 'addDataAgency']);

// list-advertiser
Route::get('/list-advertiser', [DashboardController::class,'indexListAdvertiser'])->name('advertiser');
Route::post('/delete-dataAdvertiser/{id}', [DashboardController::class,'deleteAdvertiser']);
Route::post('/updateDataAdvertiser/{id}', [DashboardController::class, 'updateDataAdvertiser']);
Route::post('/addDataAdvertiser', [DashboardController::class, 'addDataAdvertiser']);

// list-brand
Route::get('/list-brand', [DashboardController::class,'indexListBrand'])->name('brand');
Route::post('/delete-dataBrand/{id}', [DashboardController::class,'deleteBrand']);
Route::post('/updateDataBrand/{id}', [DashboardController::class, 'updateDataBrand']);
Route::post('/addDataBrand', [DashboardController::class, 'addDataBrand']);

// list flagrate
Route::get('/list-flagrate', [DashboardController::class,'indexListFlagrate'])->name('flagrate');
Route::post('/delete-dataFlagrate/{id}', [DashboardController::class,'deleteFlagrate']);
Route::post('/updateDataFlagrate/{id}', [DashboardController::class, 'updateDataFlagrate']);
Route::post('/addDataFlagrate', [DashboardController::class, 'addDataFlagrate']);

// list-spottype
Route::get('/list-spottype', [DashboardController::class,'indexListSpottype'])->name('spottype');
Route::post('/delete-dataSpottype/{id}', [DashboardController::class,'deleteSpottype']);
Route::post('/updateDataSpottype/{id}', [DashboardController::class, 'updateDataSpottype']);
Route::post('/addDataSpottype', [DashboardController::class, 'addDataSpottype']);

// channel
Route::get('/list-channel', [DashboardController::class,'indexListChannel'])->name('channel');
Route::post('/delete-dataChannel/{id}', [DashboardController::class,'deleteChannel']);
Route::post('/updateDataChannel/{id}', [DashboardController::class, 'updateDataChannel']);
Route::post('/addDataChannel', [DashboardController::class, 'addDataChannel']);

// Category
Route::get('/list-category', [DashboardController::class,'indexListCategory'])->name('category');
Route::post('/delete-dataCategory/{id}', [DashboardController::class,'deleteCategory']);
Route::post('/updateDataCategory/{id}', [DashboardController::class, 'updateDataCategory']);
Route::post('/addDataCategory', [DashboardController::class, 'addDataCategory']);

// settings
Route::get('/list-settings', [DashboardController::class,'indexListSettings'])->name('settings');
Route::post('/delete-dataSettings/{id}', [DashboardController::class,'deleteSettings']);
Route::post('/updateDataSettings/{id}', [DashboardController::class, 'updateDataSettings']);
Route::post('/addDataSettings', [DashboardController::class, 'addDataSettings']);

});
// Profile
Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


