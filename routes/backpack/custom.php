<?php

use App\Http\Controllers\Admin\StockCrudController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['web', 'admin'])->group(function () {
    Route::get('stock', [StockCrudController::class, 'index'])->name('stock.index');
    Route::get('stock/create', [StockCrudController::class, 'create'])->name('stock.create');
    Route::post('stock', [StockCrudController::class, 'store'])->name('stock.store');
    Route::get('stock/{id}/edit', [StockCrudController::class, 'edit'])->name('stock.edit');
    Route::put('stock/{id}', [StockCrudController::class, 'update'])->name('stock.update');
    Route::delete('stock/{id}', [StockCrudController::class, 'destroy'])->name('stock.destroy');
});
