<?php

use App\Http\Controllers\BasisHamaController;
use App\Http\Controllers\DiagnosahamaController;
use App\Http\Controllers\GejalaHamaController;
use App\Http\Controllers\HamaController;
use App\Http\Controllers\HasilHamaController;
use App\Http\Controllers\KondisiHamaController;
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

// Diagnosa Hama
Route::get('/diagnosahama', [DiagnosahamaController::class, 'index']);
Route::post('/diagnosahama', [DiagnosahamaController::class, 'store']);
Route::get('/hasilhama', [HasilHamaController::class, 'index']);

// Hama
Route::get('/hama', [HamaController::class, 'index']);
Route::get('/hama/create', [HamaController::class, 'create']);
Route::post('/hama', [HamaController::class, 'store']);
Route::get('/hama/{hama}/edit', [HamaController::class, 'edit']);
Route::delete('/hama/{hama}', [HamaController::class, 'destroy']);
Route::patch('/hama/{hama}', [HamaController::class, 'update']);

// Gejala Hama
Route::get('/gejalahama', [GejalaHamaController::class, 'index']);
Route::get('/gejalahama/create', [GejalaHamaController::class, 'create']);
Route::post('/gejalahama', [GejalaHamaController::class, 'store']);
Route::get('/gejalahama/{gejalahama}/edit', [GejalaHamaController::class, 'edit']);
Route::delete('/gejalahama/{gejalahama}', [GejalaHamaController::class, 'destroy']);
Route::patch('/gejalahama/{gejalahama}', [GejalaHamaController::class, 'update']);

// Kondisi Hama
Route::get('/kondisihama', [KondisiHamaController::class, 'index']);
Route::get('/kondisihama/create', [KondisiHamaController::class, 'create']);
Route::post('/kondisihama', [KondisiHamaController::class, 'store']);
Route::get('/kondisihama/{kondisihama}/edit', [KondisiHamaController::class, 'edit']);
Route::delete('/kondisihama/{kondisihama}', [KondisiHamaController::class, 'destroy']);
Route::patch('/kondisihama/{kondisihama}', [KondisiHamaController::class, 'update']);

// Basis Hama
Route::get('/basishama', [BasisHamaController::class, 'index']);
Route::get('/basishama/create', [BasisHamaController::class, 'create']);
Route::post('/basishama', [BasisHamaController::class, 'store']);
Route::get('/basishama/{basishama}/edit', [BasisHamaController::class, 'edit']);
Route::delete('/basishama/{basishama}', [BasisHamaController::class, 'destroy']);
Route::patch('/basishama/{basishama}', [BasisHamaController::class, 'update']);
