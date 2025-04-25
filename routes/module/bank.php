<?php

declare(strict_types=1);

use App\Http\Controllers\Bank\BankCreateController;
use App\Http\Controllers\Bank\BankDeleteController;
use App\Http\Controllers\Bank\BankIndexController;
use App\Http\Controllers\Bank\BankSaveController;
use App\Http\Controllers\Bank\BankUpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/bank/create',
    [BankCreateController::class, 'create'])
    ->can('create bank');

Route::match(['get', 'post'], '/bank',
    [BankIndexController::class, 'index'])
    ->can('read bank');

Route::get('/bank/update/{uuid}',
    [BankUpdateController::class, 'update'])
    ->can('update bank');

Route::post('/bank/save',
    [BankSaveController::class, 'save'])
    ->can('update bank');

Route::get('/bank/delete/{uuid}',
    [BankDeleteController::class, 'delete'])
    ->can('delete bank');
