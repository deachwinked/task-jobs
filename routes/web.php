<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Send Welcome Email
Route::get('send-mail', [TaskController::class, 'index']);
