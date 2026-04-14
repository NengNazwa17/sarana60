<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('student.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') abort(403);
        $pengaduans = \App\Models\Pengaduan::latest()->get();
        return view('dashboard', compact('pengaduans'));
    })->name('admin.dashboard');

    // Admin Pengaduan Actions
    Route::get('/admin/pengaduan', [\App\Http\Controllers\Admin\PengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/admin/arsip', [\App\Http\Controllers\Admin\PengaduanController::class, 'arsip'])->name('admin.pengaduan.arsip');
    Route::get('/admin/pengaduan/{id}', [\App\Http\Controllers\Admin\PengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::put('/admin/pengaduan/{id}/status', [\App\Http\Controllers\Admin\PengaduanController::class, 'updateStatus'])->name('admin.pengaduan.status.update');

    // Admin Categories Actions
    Route::resource('/admin/categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');

    // Admin Users Actions
    Route::resource('/admin/users', \App\Http\Controllers\Admin\UserController::class)->except(['create', 'show', 'edit'])->names('admin.users');

    Route::get('/student/dashboard', function () {
        if (Auth::user()->role !== 'student') abort(403);
        $pengaduans = \App\Models\Pengaduan::where('user_id', Auth::id())->latest()->take(5)->get();
        return view('student.dashboard', compact('pengaduans'));
    })->name('student.dashboard');

    Route::get('/student/pengaduan', [\App\Http\Controllers\PengaduanController::class, 'index'])->name('student.pengaduan.index');
    Route::get('/student/pengaduan/create', [\App\Http\Controllers\PengaduanController::class, 'create'])->name('student.pengaduan.create');
    Route::post('/student/pengaduan', [\App\Http\Controllers\PengaduanController::class, 'store'])->name('student.pengaduan.store');
    Route::get('/student/pengaduan/{id}', [\App\Http\Controllers\PengaduanController::class, 'show'])->name('student.pengaduan.show');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Profile Actions
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
