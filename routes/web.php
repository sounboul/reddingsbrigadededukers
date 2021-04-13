<?php

use App\Http\Controllers\ActiviteitenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LedenController;
use App\Http\Controllers\TimeslotController;
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

// Authenticate
Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::resource('/leden', LedenController::class)->parameters([
        'leden' => 'leden:username']);
    Route::resource('/groepen', GroupController::class)->parameters([
        'groepen' => 'groepen:name']);
    Route::resource('/timeslots', TimeslotController::class);
    Route::get('/ledenzoeken', [LedenController::class, 'searchMembers'])->name('leden.search');
    Route::post('/couplememberuser', [LedenController::class, 'coupleUser'])->name('leden.coupleUser');
    Route::post('/decouplememberuser', [LedenController::class, 'decoupleUser'])->name('leden.decoupleUser');
    Route::post('/addMemberToGroup', [LedenController::class, 'addMemberToGroup'])->name('addMemberToGroup');
    Route::post('/removeMemberFromGroup', [LedenController::class, 'removeMemberFromGroup'])->name('removeMemberFromGroup');
});
