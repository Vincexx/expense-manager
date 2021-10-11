<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RoleController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function () {
    return response()->json(Auth::user());
});

Route::post('login', 'api\LoginController@login');
Route::middleware('auth:sanctum')->post('logout', 'api\LoginController@logout');

Route::prefix('user')->group(function() {
    Route::get('/list', 'api\UserController@list');
    Route::post('/store', 'api\UserController@store');
    Route::patch('/update/{user}', 'api\UserController@update');
    Route::delete('/delete/{user}', 'api\UserController@destroy');
});

Route::prefix('role')->group(function() {
    Route::get('/list', 'api\RoleController@list');
    Route::post('/store', 'api\RoleController@store');
    Route::patch('/update/{role}', 'api\RoleController@update');
    Route::delete('/delete/{role}', 'api\RoleController@destroy');
});

Route::prefix('category')->group(function() {
    Route::get('/list', 'api\CategoryController@list');
    Route::post('/store', 'api\CategoryController@store');
    Route::patch('/update/{category}', 'api\CategoryController@update');
    Route::delete('/delete/{category}', 'api\CategoryController@destroy');
});

Route::prefix('expense')->group(function() {
    Route::get('/list', 'api\ExpenseController@list');
    Route::post('/store', 'api\ExpenseController@store');
    Route::patch('/update/{category}', 'api\ExpenseController@update');
    Route::delete('/delete/{category}', 'api\ExpenseController@destroy');
});

