<?php

use App\Http\Controllers\Api\PatientsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'patients', 'as' => 'patients.'], function () {
    Route::get('/', [PatientsController::class, 'index'])->name('index');
    Route::get('/{idCard}', [PatientsController::class, 'show'])->name('show');
});
