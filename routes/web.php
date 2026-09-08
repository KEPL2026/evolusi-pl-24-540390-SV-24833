<?php

use App\Http\Controllers\CatatanEvolusiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/catatan', [CatatanEvolusiController::class, 'index'])->name('catatan.index');
Route::get('/catatan/create', [CatatanEvolusiController::class, 'create'])->name('catatan.create');
Route::post('/catatan', [CatatanEvolusiController::class, 'store'])->name('catatan.store');
Route::delete('/catatan/{catatan}', [CatatanEvolusiController::class, 'destroy'])->name('catatan.destroy');
