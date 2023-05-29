<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\Band\Index as BandIndex;
use App\Http\Livewire\Booking\Index;
use App\Http\Livewire\Dashboard\Reviews;

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
    return view('landing');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);


Route::group(['middleware'=>['auth']], function(){

    Route::get('/band', function () {
        return view('components.band');
    });

    Route::get('/dashboard', function () {
        return view('components.dashboard');
    });
    Route::get('/settings', function () {
        return view('components.accountSettings');
    });

    Route::get('/profile', function () {
        return view('components.profileSettings');
    });


    Route::get('/band/{id}/booking/', Index::class)->name('band.booking');
    Route::post('band/{id}/{band}/submitrequest', [Index::class, 'submit'])->name('band.booking.submit');

    Route::get('/success', function () {
        return view('components.bookSucess');
    });

    Route::get('/booking/{id}/reviews',  Reviews::class)->name('dashboard.reviews');
    Route::get('/home', function () {
        return view('welcome');
    });

});


