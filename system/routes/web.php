<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

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
Route::get('test-ajax', [HomeController::class, 'testAjax']);
Route::get('/', [HomeController::class, 'showBeranda']);
Route::get('/list', [HomeController::class, 'showList']);

Route::get('settings', [SettingsController::class, 'index']);
Route::post('settings', [SettingsController::class, 'store']);

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('user', UserController::class);
    Route::prefix('products')->group(function () {
        Route::resource('pc', ProdukController::class);
        Route::post('pc/filter', [ProdukController::class, 'filter']);
    });
});


Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// Route::get('laptop', [HomeController::class, 'showLaptop']);
// Route::get('smartphone', [HomeController::class, 'showSmartphone']);
// Route::get('accessories', [HomeController::class, 'showAccessories']);
// Route::get('details', [HomeController::class, 'showDetails']);
// Route::get('masuk', [AuthController::class, 'showLogin']);
// Route::get('daftar', [AuthController::class, 'registration']);

Route::get('template', function () {
    return view('template.base');
});

// Route::get('dashboard', function () {
//     return view('template.section.dashboard');
// });

// Route::get('pc', function () {
//     return view('template.section.pc');
// });

// Route::get('laptop', function () {
//     return view('template.section.laptop');
// });

// Route::get('smartphone', function () {
//     return view('template.section.smartphone');
// });

// Route::get('accessories', function () {
//     return view('template.section.accessories');
// });

// Route::get('detail', function () {
//     return view('template.section.detail');
// });

// Route::get('login', function () {
//     return view('template.section.login');
// });

// Route::get('register', function () {
//     return view('template.section.register');
// });