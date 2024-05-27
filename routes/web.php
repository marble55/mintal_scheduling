<?php

use App\Http\Controllers\AcademicCalendarController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FacultyScheduleController;
use App\Http\Controllers\SubjectController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('faculty', FacultyController::class)
    ->middleware(['auth', 'verified']);

Route::resource('classroom', ClassroomController::class)
    ->middleware(['auth', 'verified']);

Route::resource('subject', SubjectController::class)
    ->middleware(['auth', 'verified']);

Route::resource('block', BlockController::class)
    ->middleware(['auth', 'verified']);

Route::resource('academic-calendar', AcademicCalendarController::class)
    ->middleware(['auth', 'verified']);

Route::resource('schedule', ScheduleController::class)
    ->middleware(['auth', 'verified']);
// Kani kay para sa faculty schedule nga route
Route::resource('facultySchedule', FacultyScheduleController::class)
    ->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'updateImage'])->name('profile.image-update');
});

require __DIR__ . '/auth.php';
