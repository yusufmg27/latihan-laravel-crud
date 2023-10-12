<?php

use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
return view('/auth/login');
});

Route::middleware(['auth'])->group(function() {
Route::resource('siswa', MasterCategoryController::class);
});
Route::get('/siswa/datatables', [App\Http\Controllers\MasterCategoryController::class, 'getCategories'])->name('siswa.datatables');
Route::patch('/siswa/activate/{id}', [App\Http\Controllers\MasterCategoryController::class, 'activate'])->name('siswa.activate');
Route::post('/siswa/export_excel', [App\Http\Controllers\MasterCategoryController::class, 'export_excel'])->name('export-excel');
Route::post('/siswa/export_pdf', [App\Http\Controllers\MasterCategoryController::class, 'export_pdf'])->name('export-pdf');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
