<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Group\DashboardController as GroupDashboardController;
use App\Http\Controllers\Group\TransactionController as GroupTransactionController;
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
| be assigned to the "web" middleware group. Make something great!!!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {

    // personal routes
    Route::get('/mijn-groepen', [HomeController::class, 'index'])->name('group.start');
    // profile overview
    Route::get('/profiel', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profiel/aanpassen', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiel', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiel', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/groep/maken', [GroupController::class, 'index'])->name('group.create');
    Route::post('/groep/maken', [GroupController::class, 'store'])->name('group.store');

    // accept invitation
    Route::get('/uitnodiging/{token}', [GroupController::class, 'acceptInvitation'])->name('group.accept');

    // group routes
    Route::middleware('group')->group(function () {

        // group
        Route::get('{group}/dashboard', [GroupDashboardController::class, 'index'])->name('group.dashboard');
        Route::post('{group}/edit', [GroupController::class, 'update'])->name('group.update');
        Route::get('{group}/edit', [GroupController::class, 'edit'])->name('group.edit');
        Route::put('{group}/accept', [GroupController::class, 'accept'])->name('group.accept');
        Route::put('{group}/decline', [GroupController::class, 'decline'])->name('group.decline');
        // group invitation link

        // members
        Route::get('{group}/leden', [GroupMembersController::class, 'index'])->name('group.members');
        Route::post('{group}/leden/uitnodigen', [GroupMembersController::class, 'invite'])->name('group.members.invite');
        Route::post('{group}/leden/zoeken', [GroupMembersController::class, 'search'])->name('group.members.search');
        Route::get('{group}/leden/{user}', [GroupMembersController::class, 'show'])->name('group.members.show');


        // trade
        Route::get('{group}/ruilen', [GroupPostController::class, 'index'])->name('group.post.index');
        Route::post('{group}/ruilen', [GroupPostController::class, 'search'])->name('group.post.search');
        Route::get('{group}/ruilen/nieuw', [GroupPostController::class, 'create'])->name('group.post.create');
        Route::post('{group}/ruilen/nieuw', [GroupPostController::class, 'store'])->name('group.post.store');
        Route::get('{group}/ruilen/{post}', [GroupPostController::class, 'show'])->name('group.post.show');
        Route::get('{group}/ruilen/{post}/edit', [GroupPostController::class, 'edit'])->name('group.post.edit');
        Route::put('{group}/ruilen/{post}', [GroupPostController::class, 'update'])->name('group.post.update');
        Route::delete('{group}/ruilen/{post}', [GroupPostController::class, 'destroy'])->name('group.post.destroy');

        // comment on post
        Route::post('{group}/ruilen/{post}/comment', [CommentController::class, 'store'])->name('group.post.comment');
        Route::delete('{group}/ruilen/{post}/comment/{comment}', [CommentController::class, 'destroy'])->name('group.post.comment.destroy');

        // transactions
        Route::get('{group}/transacties', [GroupTransactionController::class, 'index'])->name('group.transactions');
        Route::post('{group}/transacties/zoeken', [GroupTransactionController::class, 'search'])->name('group.transactions.search');
        Route::get('{group}/transacties/nieuw', [GroupTransactionController::class, 'create'])->name('group.transactions.create');
        Route::post('{group}/transacties/nieuw', [GroupTransactionController::class, 'store'])->name('group.transactions.store');

        // map
        Route::get('{group}/kaart', [GroupMapController::class, 'index'])->name('group.map');
    });
});

require __DIR__ . '/auth.php';
