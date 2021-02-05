<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupervisorController;
use App\Models\Item;

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
// Other
Route::get('comingsoon', function () {
    return view('Other.comingsoon');
});

// Authentication
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('user');
Route::post('/', [AuthController::class, 'login'])->name('login')->middleware('user');

// Supervisor
Route::group(['middleware' => ['user'], 'prefix' => 'supervisor'], function () {
    Route::get('/tes', [SupervisorController::class, 'tes']);

    Route::get('/accountpayable', [SupervisorController::class, 'company'])->name('ap');
    Route::get('/accountpayable/{company}', [SupervisorController::class, 'category'])->name('apcompany');
    Route::get('/accountpayable/{company}/{category}', [SupervisorController::class, 'list'])->name('aplist');
    Route::get('/accountpayable/{company}/{category}/tambah', function () {
        return view('supervisor.apadd');
    })->name('apadd');
    Route::get('/accountpayable/{name}/{category}/{id}', [SupervisorController::class, 'detail'])->name('apdetail');
});

// Route::get('/register', function () {
//     return view('Auth.register');
// });
// Route::get('/dashboard', function () {
//     return view('User.dashboard');
// })->middleware('user');
// Route::post('/', [AuthController::class, 'login'])->name('login')->middleware('user');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password')->middleware('user');
// Route::get('/logout', [AuthController::class, 'logout']);

// Supervisor
// Route::group(['middleware' => ['user'], 'prefix' => 'supervisor'], function () {
    // Route::get('/', function () {
    //     return view('Supervisor.dashboard');
    // });
    // Route::get('/account-payable', function () {
    //     return view('Supervisor.accountpayable');
    // });

    // Route::get('profile', function () {
    //     return view('Supervisor.profile');
    // });

    // Route::group(['prefix' => '/account-payable'], function () {
    //     Route::get('/', [SupervisorController::class, 'accountpayable']);
    //     Route::get('/{name}', [SupervisorController::class, 'accountpayable'])->name('apcompany');
    //     Route::get('/{name}/{category}', [SupervisorController::class, 'accountpayable'])->name('aplist');
    //     Route::get('/{name}/{category}/tambah', [SupervisorController::class, 'addaccountpayable'])->name('tambah');
    //     Route::post('/{name}/{category}/tambah', [SupervisorController::class, 'addaccountpayable'])->name('tambah');
    //     Route::get('/{name}/{category}/{id}', [SupervisorController::class, 'accountpayable'])->name('apdetail');
    // });

    // Add Account Item
    // Route::get('/item/{suplier}', function ($suplier) {
    //     echo Item::where('suplier', $suplier)->get();
    // });
// });

