<?php
use Buckhill\Exchange\Http\Controllers\ExchangeController;
use Illuminate\Support\Facades\Route;

Route::post('api/exchange', ExchangeController::class)->middleware('api');
