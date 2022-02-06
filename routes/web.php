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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogleProvider']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleProviderCallback']);

Auth::routes();

Route::middleware(['auth'])->group(function() {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/profile/{user}', [App\Http\Controllers\UserProfileController::class, 'index'])->name('user.profile');
  Route::post('/profile/update/{user}', [App\Http\Controllers\UserProfileController::class, 'update'])->name('profile.update');

  //Records
  Route::get('/record/view/{record}', [App\Http\Controllers\RecordController::class, 'index'])->name('record.view');
  Route::get('/record/create', [App\Http\Controllers\RecordController::class, 'create'])->name('record.create');
  Route::post('/record/store', [App\Http\Controllers\RecordController::class, 'store'])->name('record.store');
  Route::post('/record/delete/{record}', [App\Http\Controllers\RecordController::class, 'delete'])->name('record.delete');
  Route::post('/record/edit/{record}', [App\Http\Controllers\RecordController::class, 'edit'])->name('record.edit');
});


