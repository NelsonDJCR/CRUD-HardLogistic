<?php

use App\Http\Controllers\api\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::apiResource('/hello', UserController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/listar', function () {
    return view('list');
});
Route::post('/filter', function (Request $r) {
    
    $data = User::
    where(function ($query) use ($r) {
        if (isset($r['name'])) {
            if (!empty($r['name']))
                $query->orwhere("users.name", "like", "%".$r['name']."%");
        }
    })
    ->where(function ($query) use ($r) {
        if (isset($r['dni'])) {
            if (!empty($r['dni']))
                $query->orwhere("users.dni", "like", "%".$r['dni']."%");
        }
    })
    ->where(function ($query) use ($r) {
        if (isset($r['nationality'])) {
            if (!empty($r['nationality']))
                $query->orwhere("users.nationality", "like", "%".$r['nationality']."%");
        }
    })
    ->orderBy('id','DESC')
    ->get();
    return response()->json([
        'data' => $data
    ]);

    return view('list')->with(['data' => $data]);
});
