<?php

use Illuminate\Support\Facades\Route;

// Группа маршрутов для админки
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    // CRUD маршрут для Stock
    Route::crud('stock', 'StockCrudController');

    // Если будут новости
    // Route::crud('news', 'NewsCrudController');
});
