<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ParticipantController as AdminParticipantController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\AboutImageController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\LeaderboardController;
use App\Http\Controllers\Admin\RecapImageController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\DoorprizeController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/recap', [HomeController::class, 'recap'])->name('recap');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [ParticipantController::class, 'store'])->name('participant.store');

// Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.participants.index');
    })->name('dashboard'); // Keeping the name 'dashboard' for potential internal references, but it now redirects.
    Route::resource('categories', CategoryController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('timelines', TimelineController::class)->except(['show']);
    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
    Route::post('leaderboard', [LeaderboardController::class, 'store'])->name('leaderboard.store');
    Route::delete('leaderboard/{leaderboard}', [LeaderboardController::class, 'destroy'])->name('leaderboard.destroy');

    Route::get('sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
    Route::post('sponsors', [SponsorController::class, 'store'])->name('sponsors.store');
    Route::delete('sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');
    Route::get('rules', [RuleController::class, 'index'])->name('rules.index');
    Route::post('rules', [RuleController::class, 'store'])->name('rules.store');
    Route::put('rules/{rule}', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('rules/{rule}', [RuleController::class, 'destroy'])->name('rules.destroy');
    Route::post('rules/pdf', [RuleController::class, 'uploadPdf'])->name('rules.upload-pdf');
    Route::delete('rules/pdf/delete', [RuleController::class, 'deletePdf'])->name('rules.delete-pdf');
    Route::get('doorprizes', [DoorprizeController::class, 'index'])->name('doorprizes.index');
    Route::post('doorprizes', [DoorprizeController::class, 'store'])->name('doorprizes.store');
    Route::delete('doorprizes/{doorprize}', [DoorprizeController::class, 'destroy'])->name('doorprizes.destroy');
    Route::get('participants', [AdminParticipantController::class, 'index'])->name('participants.index');
    Route::get('participants/{participant}', [AdminParticipantController::class, 'show'])->name('participants.show');
    Route::patch('participants/{participant}/status', [AdminParticipantController::class, 'updateStatus'])->name('participants.status');
    Route::delete('participants/{participant}', [AdminParticipantController::class, 'destroy'])->name('participants.destroy');
});
