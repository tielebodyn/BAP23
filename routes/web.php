<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Group\DashboardController as GroupDashboardController;
use App\Http\Controllers\Group\MembersController as GroupMembersController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () { return view('welcome'); })->name('home');


Route::get('/startpagina', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('start');

Route::middleware('auth')->group(function () {
    Route::get('/profiel', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiel', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiel', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kaart', function () { return view('map.index'); })->name('map');
    Route::get('/aanbiedingen', function () { return view('welcome'); })->name('offers');
    Route::get('/transacties', function () { return view('welcome'); })->name('transactions');
    Route::get('/groep/maken', [GroupController::class, 'index'])->name('group.create');
    Route::post('/groep/maken', [GroupController::class, 'store'])->name('group.store');

    Route::get('/startpagina', [HomeController::class, 'index'])->name('start');
    // groep maken
    // group routes
    Route::middleware('group')->group(function () {
        Route::get('{group}/dashboard', [GroupDashboardController::class, 'index'])->name('group.dashboard');
        Route::get('{group}/leden', [GroupMembersController::class, 'index'])->name('group.members');
    });

});

require __DIR__.'/auth.php';
