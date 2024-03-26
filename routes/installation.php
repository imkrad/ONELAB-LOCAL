<?php

use Illuminate\Support\Facades\Route;

Route::get('/installation', function () {return inertia('Installation'); });

Route::prefix('sync')->group(function(){
    Route::get('/check', [App\Http\Controllers\SyncController::class, 'checkApi']);
    Route::get('/counts', [App\Http\Controllers\SyncController::class, 'fetchCount']);
    Route::get('/lists', [App\Http\Controllers\SyncController::class, 'lists']);
    Route::get('/names', [App\Http\Controllers\SyncController::class, 'names']);
    Route::get('/locations', [App\Http\Controllers\SyncController::class, 'locations']);
    Route::get('/laboratories', [App\Http\Controllers\SyncController::class, 'laboratories']);
    Route::post('/customers-download', [App\Http\Controllers\SyncController::class, 'customers_download']);
    Route::post('/customers-upload', [App\Http\Controllers\SyncController::class, 'customers_upload']);
    Route::post('/testservices-upload', [App\Http\Controllers\SyncController::class, 'testservices_upload']);
});