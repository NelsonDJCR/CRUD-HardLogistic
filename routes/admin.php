<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/user', UserController::class);