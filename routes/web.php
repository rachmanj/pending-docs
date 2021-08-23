<?php

use App\Http\Controllers\Data011Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PendingdocsController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/outsdocs/011', [PendingdocsController::class, 'outsdocs011'])->name('outsdocs011.index');
Route::get('/outsdocs/show/{id}', [PendingdocsController::class, 'show'])->name('outsdocs.show');


// Data Controller
Route::get('/outsdocs/011/data', [Data011Controller::class, 'index011'])->name('outdocs011.index.data');

// Invoice
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
