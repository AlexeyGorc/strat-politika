<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialsPublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/analytics', function () {
    return view('home');
})->name('analytics');

Route::get('/risks', function () {
    return view('home');
})->name('risks');

Route::get('/consultations', function () {
    return view('consultations');
})->name('consultations');

Route::post('/consultations', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'organization' => 'nullable|string|max:255',
        'purpose' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    \Log::info('Имитация: запрос консультации', $validated);

    return back()->with('success', 'Запрос отправлен! Скоро с Вами свяжутся.');
})->name('consultations.submit');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::post('/contacts', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:2000',
    ]);

    return back()->with('success', 'Сообщение успешно отправлено!');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'group:1'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('/users', UserController::class)->except(['show']);

        Route::resource('/groups', GroupController::class)->except(['show']);
    });

Route::middleware(['auth', 'group:1, 2'])->group(function () {
    Route::get('/editor', [MaterialController::class, 'index'])->name('editor.index');
    Route::get('/editor/add', [MaterialController::class, 'create'])->name('editor.create');
    Route::post('/editor', [MaterialController::class, 'store'])->name('editor.store');

    Route::get('/editor/{material:slug}/edit', [MaterialController::class, 'edit'])->name('editor.edit');
    Route::put('/editor/{material:slug}',       [MaterialController::class, 'update'])->name('editor.update');

    Route::delete('/editor/{material:slug}',    [MaterialController::class, 'destroy'])->name('editor.destroy');
});

Route::get('/analytics', [MaterialsPublicController::class, 'analytics'])->name('materials.analytics');
Route::get('/risks',     [MaterialsPublicController::class, 'risks'])->name('materials.risks');

Route::get('/materials/{material:slug}', [MaterialsPublicController::class, 'show'])->name('materials.show');

require __DIR__ . '/auth.php';
