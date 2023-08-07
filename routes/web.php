<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Group\DashboardController as GroupDashboardController;
use App\Http\Controllers\Group\MembersController as GroupMembersController;
use App\Http\Controllers\Group\PostController as GroupPostController;
use App\Http\Controllers\Group\MapController as GroupMapController;

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
    Route::get('/transacties', function () { return view('welcome'); })->name('transactions');
    Route::get('/groep/maken', [GroupController::class, 'index'])->name('group.create');
    Route::post('/groep/maken', [GroupController::class, 'store'])->name('group.store');
    Route::get('/startpagina', [HomeController::class, 'index'])->name('start');
    // dropzone create group image
    Route::post('/dropzone/store', [DropzoneController::class, 'storeGroupImage'])->name('dropzone.store.group');
    // groep maken
    // group routes
    Route::middleware('group')->group(function () {
        Route::get('{group}/dashboard', [GroupDashboardController::class, 'index'])->name('group.dashboard');
        Route::get('{group}/leden', [GroupMembersController::class, 'index'])->name('group.members');
        Route::get('{group}/ruilen', [GroupPostController::class, 'index'])->name('group.post');
        Route::get('{group}/ruilen/nieuw', [GroupPostController::class, 'create'])->name('group.post.create');
        Route::get('{group}/ruilen/{post}', [GroupPostController::class, 'show'])->name('group.post.show');
        Route::get('{group}/kaart', [GroupMapController::class, 'index'])->name('group.map');
        // map

    });

});

require __DIR__.'/auth.php';
