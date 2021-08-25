<?php

use App\Http\Controllers\AccountingController;
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
Route::get('/accounting/index/data', [DataController::class, 'accountingIndex'])->name('accountingIndex.data');
Route::get('/accounting/000H/data', [DataController::class, 'index000H'])->name('accounting000H.data');
Route::get('/accounting/001H/data', [DataController::class, 'index001H'])->name('accounting001H.data');
Route::get('/accounting/invoices/data', [DataController::class, 'accountingInvoices'])->name('accountingInvoices.data');
Route::get('/accounting/addocs/{inv_id}/data', [DataController::class, 'addocsByInvoice'])->name('addocsByInvoice.data');

// Invoice
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');

// Accounting
Route::get('/accounting/addocs', [AccountingController::class, 'outdocs_index'])->name('accounting.outdocs_index');
Route::get('/accounting/addocs/000H', [AccountingController::class, 'outsdocs000H'])->name('accounting.outdocs_000H');
Route::get('/accounting/addocs/001H', [AccountingController::class, 'outsdocs001H'])->name('accounting.outdocs_001H');
Route::get('/accounting/addocs/edit/{id}', [AccountingController::class, 'edit_addoc'])->name('accounting.edit_addoc');
Route::put('/accounting/addocs/{id}', [AccountingController::class, 'update_addoc'])->name('accounting.update_addoc');
Route::get('/accounting/invoices', [AccountingController::class, 'invoices'])->name('accounting.invoices');
Route::get('/accounting/addocs/{inv_id}/add', [AccountingController::class, 'add_addoc'])->name('accounting.add_addoc');
Route::post('/accounting/addocs/{inv_id}', [AccountingController::class, 'store_addoc'])->name('accounting.store_addoc');
Route::delete('/accounting/addocs/{id}', [AccountingController::class, 'destroy_addoc'])->name('accounting.destroy_addoc');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    // return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
