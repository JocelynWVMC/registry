<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HperController;
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

// Route::get('/', function () {
//     return view('hper');
// });
Route::get('/', [HperController::class, 'hper_view'])->name('hper.view');
Route::post('/search/patient', [HperController::class, 'hper_search_patient'])->name('hper.search.patient');
//Route::post('/view/patient/table', [HsariController::class, 'hrep_view_patient_table'])->name('hsari.view.patient.table');
