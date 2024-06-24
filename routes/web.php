<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::post('/contact', ContactController::class)->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/skills', SkillController::class);
    Route::resource('/projects', ProjectController::class);
});

// Registration routes with custom logic to restrict access after two admins
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        if (User::role('admin')->count() >= 2) {
            return redirect('/')->with('error', 'Registration is closed');
        }
        return Inertia::render('Auth/Register');
    })->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

require __DIR__.'/auth.php';
