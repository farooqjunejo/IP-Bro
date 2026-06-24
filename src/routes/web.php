<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LookupController;

Route::get('/', [LookupController::class, 'index'])->name('home');
Route::post('/lookup', [LookupController::class, 'lookup'])->name('lookup')->middleware('throttle:60,1');
Route::get('/history', [LookupController::class, 'history'])->name('history');
Route::delete('/history/{id}', [LookupController::class, 'destroy'])->name('history.destroy');
Route::post('/history/clear', [LookupController::class, 'clear'])->name('history.clear');