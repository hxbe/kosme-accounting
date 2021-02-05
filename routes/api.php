<?php

use App\Http\Controllers\Api\AccountPayableApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\SuplierApiController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// $func = function () {
//     Route::get('/', [ApiController::class, 'read']);
//     Route::get('{id}', [ApiController::class, 'read']);

//     Route::post('/', [ApiController::class, 'create']);

//     Route::put('{id}', [ApiController::class, 'update']);

//     Route::delete('{id}', [ApiController::class, 'delete']);
// };

// Route::group(['prefix' => 'invoice'], $func);
// Route::group(['prefix' => 'suplier'], $func);

Route::group(['middleware' => 'user', 'prefix' => 'supervisor/codewithmamangreget'], function () {
    Route::get('/suplier', [SuplierApiController::class, 'read']);
    Route::get('/suplier/{id}', [SuplierApiController::class, 'read']);

    Route::get('/bank', [BankApiController::class, 'read']);
    Route::get('/bank/{id}', [BankApiController::class, 'read']);

    Route::get('/company', [CompanyApiController::class, 'read']);
    Route::get('/company/{abbr}', [CompanyApiController::class, 'read']);

    Route::get('/category', [CategoryApiController::class, 'read']);
    Route::get('/category/{name}', [CategoryApiController::class, 'read']);

    Route::post('/accountpayable', [AccountPayableApiController::class, 'create']);
    Route::delete('/accountpayable', [AccountPayableApiController::class, 'delete']);
    // Route::get('/accountpayable/{name}', [AccountPayableApiController::class, 'read']);
});
