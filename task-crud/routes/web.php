<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks',TaskController::class);
