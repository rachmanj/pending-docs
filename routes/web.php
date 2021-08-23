<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PendingdocsController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/outsdocs/011', [PendingdocsController::class, 'outsdocs011'])->name('outsdocs011.index');
Route::get('/outsdocs/017', [PendingdocsController::class, 'outsdocs017'])->name('outsdocs017.index');
Route::get('/outsdocs/APS', [PendingdocsController::class, 'outsdocsAPS'])->name('outsdocsAPS.index');


// Data Controller
Route::get('/outsdocs/011/data', [DataController::class, 'index011'])->name('index011.data');
Route::get('/outsdocs/017/data', [DataController::class, 'index017'])->name('index017.data');
Route::get('/outsdocs/APS/data', [DataController::class, 'indexAPS'])->name('indexAPS.data');

// Invoice
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
