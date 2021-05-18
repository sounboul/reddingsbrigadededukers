<?php

use App\Http\Controllers\ActiviteitenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LedenController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerenigingController;
use App\Http\Controllers\WaterhulpverleningController;
use App\Http\Controllers\ZwemmendreddenController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/zwemmendredden', [ZwemmendreddenController::class, 'index'])->name('zwemmendredden');
Route::get('/waterhulpverlening', [WaterhulpverleningController::class, 'index'])->name('waterhulpverlening');
Route::get('/activiteiten', [ActiviteitenController::class, 'index'])->name('activiteiten');
Route::get('/vereniging', [VerenigingController::class, 'index'])->name('vereniging');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.sendMail');

// Authenticate
Route::group(['middleware' => ['auth:sanctum', 'verified',]], function() {
    Route::resource('/leden', LedenController::class)->parameters([
        'leden' => 'leden:username']);
    Route::resource('/groepen', GroupController::class)->parameters([
        'groepen' => 'groepen:name']);
    Route::resource('/timeslots', TimeslotController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('/ledenzoeken', [LedenController::class, 'searchMembers'])->name('leden.search');
    Route::post('/couplememberuser', [LedenController::class, 'coupleUser'])->name('leden.coupleUser');
    Route::post('/decouplememberuser', [LedenController::class, 'decoupleUser'])->name('leden.decoupleUser');
    Route::post('/addMemberToGroup', [LedenController::class, 'addßMemberToGroup'])->name('addMemberToGroup');
    Route::post('/removeMemberFromGroup', [LedenController::class, 'removeMemberFromGroup'])->name('removeMemberFromGroup');


    // Admin
    Route::group(['middleware' => []],function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/confirmCouple', [AdminController::class, 'confirmCouple'])->name('confirmCouple');
        Route::post('/unconfirmCouple', [AdminController::class, 'unconfirmCouple'])->name('unconfirmCouple');
        Route::get('users/{username}', [UserController::class, 'show'])->name('user.show');
        Route::post('/activateUser', [AdminController::class, 'activateUser'])->name('activateUser');
        Route::post('/deactivateUser', [AdminController::class, 'deactivateUser'])->name('deactivateUser');
        Route::post('/makeAdmin', [AdminController::class, 'makeAdmin'])->name('makeAdmin');
        Route::post('/delAdmin', [AdminController::class, 'delAdmin'])->name('delAdmin');
        Route::post('/makeInstructor', [AdminController::class, 'makeInstructor'])->name('makeInstructor');
        Route::post('/delInstructor', [AdminController::class, 'delInstructor'])->name('delInstructor');
        Route::post('/makeEditor', [AdminController::class, 'makeEditor'])->name('makeEditor');
        Route::post('/delEditor', [AdminController::class, 'delEditor'])->name('delEditor');

        Route::post('/activateMember', [AdminController::class, 'activateMember'])->name('activateMember');
        Route::post('/deactivateMember', [AdminController::class, 'deactivateMember'])->name('deactivateMember');
    });

});
