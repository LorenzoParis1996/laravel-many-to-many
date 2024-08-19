<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\HomeController as GuestHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [GuestHomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function() {
        Route::get('home', [AdminHomeController::class, 'index'])->name('home')->middleware('auth');
        Route::resource('/projects', AdminProjectController::class);
        Route::resource('/types', AdminTypeController::class);
        Route::resource('/technologies', AdminTechnologyController::class);
    }
);