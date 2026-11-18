<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactTopicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\MilestoneTypeController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PrincipleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Seluruh rute panel administrasi portofolio.
| Prefix: admin, Name: admin.*
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Rute Tamu / Belum Login (guest:admin)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Rute Terproteksi (auth:admin)
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Ubah Password
        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

        // Modul 1: Profil (Satu record, edit & update)
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Modul 2: Bidang Keahlian
        Route::resource('expertises', ExpertiseController::class)->except(['show']);

        // Modul 3: Prinsip Kerja
        Route::resource('principles', PrincipleController::class)->except(['show']);

        // Modul 4: Kategori Skill & Skill
        Route::resource('skill-categories', SkillCategoryController::class)->except(['show']);
        Route::resource('skills', SkillController::class)->except(['show']);

        // Modul 5: Kategori Proyek & Proyek
        Route::resource('project-categories', ProjectCategoryController::class)->except(['show']);
        Route::resource('projects', ProjectController::class)->except(['show']);

        // Modul 6: Tipe Milestone & Milestone
        Route::resource('milestone-types', MilestoneTypeController::class)->except(['show']);
        Route::resource('milestones', MilestoneController::class)->except(['show']);

        // Modul 7: Topik Kontak
        Route::resource('contact-topics', ContactTopicController::class)->except(['show']);
    });
});

