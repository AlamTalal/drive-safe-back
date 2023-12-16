<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LicenseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/licenses'          , [LicenseController::class, 'index'])->name('licenses.index');
Route::get('/licenses/{license}', [LicenseController::class, 'show' ])->name('licenses.show');
Route::get('/groups'            , [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/{group}'    , [GroupController::class, 'show' ])->name('groups.show');
Route::get('/files'             , [FileController::class, 'index'])->name('files.index');