<?php

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

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\CalendarController;


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::middleware(['role:admin'])->group(function () {
    Route::get('billing', [GameController::class, 'index'])->name('billing');
    Route::get('games', [GameController::class, 'index'])->name('games_index');
    Route::get('game/create', [GameController::class, 'create'])->name('game_create');
    Route::post('game', [GameController::class, 'store'])->name('games_store');
    Route::get('game/{id}', [GameController::class, 'show'])->name('game_show');
    Route::put('game/{id}', [GameController::class, 'update'])->name('game_update');
    Route::delete('game/{id}', [GameController::class, 'destroy'])->name('game_destroy');
});


Route::get('user-management', [UserController::class, 'index'])->name('user-management');
Route::get('users', [UserController::class, 'index'])->name('users_index');
Route::get('user/create', [UserController::class, 'create'])->name('user_create');
Route::post('user', [UserController::class, 'store'])->name('users_store');
Route::get('user/{id}', [UserController::class, 'show'])->name('user_show');
Route::put('user/{id}', [UserController::class, 'update'])->name('user_update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user_destroy');


Route::get('injuries', [InjuryController::class, 'index'])->name('injuries.index');
Route::get('injuries/{id}/edit', [InjuryController::class, 'edit'])->name('injuries.edit');
Route::get('injury/{id}', [InjuryController::class, 'show'])->name('injuries.show');
Route::post('injury', [InjuryController::class, 'store'])->name('injuries.store');
Route::put('injury/{id}', [InjuryController::class, 'update'])->name('injuries.update');
Route::delete('injury/{id}', [InjuryController::class,'destroy'])->name('injuries.destroy');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
    Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});



Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/events', [CalendarController::class, 'getEvents'])->name('calendar.events');


Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('games', GameController::class);
});
