<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/questionnaire', [\App\Http\Controllers\QuestionnaireController::class, 'index'])->name('questionnaire');
Route::post('/questionnaire', [\App\Http\Controllers\QuestionnaireController::class, 'store'])->name('questionnaire.store');

Route::get('/form-pelatihan', [\App\Http\Controllers\FormPelatihanController::class, 'index'])->name('form-pelatihan.index');
Route::post('/form-pelatihan', [\App\Http\Controllers\FormPelatihanController::class, 'store'])->name('form-pelatihan.store');

Route::get('/form-komunitas', [\App\Http\Controllers\FormKomunitasController::class, 'index'])->name('form-komunitas.index');
Route::post('/form-komunitas', [\App\Http\Controllers\FormKomunitasController::class, 'store'])->name('form-komunitas.store');

Route::post('/login', [\App\Http\Controllers\UserAuthController::class, 'login'])->name('users.login');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/dashboard/filter', [\App\Http\Controllers\DashboardController::class, 'filter'])->name('dashboard.filter');
    Route::get('/admin/dashboard/export', [\App\Http\Controllers\DashboardController::class, 'export'])->name('dashboard.export');

    Route::get('/admin/dosen', [\App\Http\Controllers\DosenController::class, 'index'])->name('dosen.index');
    Route::post('/admin/dosen', [\App\Http\Controllers\DosenController::class, 'store'])->name('dosen.store');
    Route::post('/admin/dosen/{id}/edit', [\App\Http\Controllers\DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/admin/dosen/{id}', [\App\Http\Controllers\DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/admin/dosen/{id}', [\App\Http\Controllers\DosenController::class, 'destroy'])->name('dosen.destroy');
    Route::get('/admin/dosen/search', [\App\Http\Controllers\DosenController::class, 'search'])->name('dosen.search');

    Route::get('/admin/fakultas', [\App\Http\Controllers\FakultasController::class, 'index'])->name('fakultas.index');
    Route::post('/admin/fakultas', [\App\Http\Controllers\FakultasController::class, 'store'])->name('fakultas.store');
    Route::post('/admin/fakultas/{id}/edit', [\App\Http\Controllers\FakultasController::class, 'edit'])->name('fakultas.edit');
    Route::put('/admin/fakultas/{id}', [\App\Http\Controllers\FakultasController::class, 'update'])->name('fakultas.update');
    Route::delete('/admin/fakultas/{id}', [\App\Http\Controllers\FakultasController::class, 'destroy'])->name('fakultas.destroy');
    Route::get('/admin/fakultas/search', [\App\Http\Controllers\FakultasController::class, 'search'])->name('fakultas.search');

    Route::get('/admin/jurusan-binaan', [\App\Http\Controllers\JurusanBinaanController::class, 'index'])->name('jurusan-binaan.index');
    Route::post('/admin/jurusan-binaan', [\App\Http\Controllers\JurusanBinaanController::class, 'store'])->name('jurusan-binaan.store');
    Route::post('/admin/jurusan-binaan/{id}/edit', [\App\Http\Controllers\JurusanBinaanController::class, 'edit'])->name('jurusan-binaan.edit');
    Route::put('/admin/jurusan-binaan/{id}', [\App\Http\Controllers\JurusanBinaanController::class, 'update'])->name('jurusan-binaan.update');
    Route::delete('/admin/jurusan-binaan/{id}', [\App\Http\Controllers\JurusanBinaanController::class, 'destroy'])->name('jurusan-binaan.destroy');
    Route::get('/admin/jurusan-binaan/search', [\App\Http\Controllers\JurusanBinaanController::class, 'search'])->name('jurusan-binaan.search');

    Route::get('/admin/binaan', [\App\Http\Controllers\BinaanController::class, 'index'])->name('binaan.index');
    Route::post('/admin/binaan', [\App\Http\Controllers\BinaanController::class, 'store'])->name('binaan.store');
    Route::post('/admin/binaan/{id}/edit', [\App\Http\Controllers\BinaanController::class, 'edit'])->name('binaan.edit');
    Route::put('/admin/binaan/{id}', [\App\Http\Controllers\BinaanController::class, 'update'])->name('binaan.update');
    Route::delete('/admin/binaan/{id}', [\App\Http\Controllers\BinaanController::class, 'destroy'])->name('binaan.destroy');
    Route::get('/admin/binaan/search', [\App\Http\Controllers\BinaanController::class, 'search'])->name('binaan.search');

    Route::get('/admin/area-kampus', [\App\Http\Controllers\AreaKampusController::class, 'index'])->name('area-kampus.index');
    Route::post('/admin/area-kampus', [\App\Http\Controllers\AreaKampusController::class, 'store'])->name('area-kampus.store');
    Route::post('/admin/area-kampus/{id}/edit', [\App\Http\Controllers\AreaKampusController::class, 'edit'])->name('area-kampus.edit');
    Route::put('/admin/area-kampus/{id}', [\App\Http\Controllers\AreaKampusController::class, 'update'])->name('area-kampus.update');
    Route::delete('/admin/area-kampus/{id}', [\App\Http\Controllers\AreaKampusController::class, 'destroy'])->name('area-kampus.destroy');
    Route::get('/admin/area-kampus/search', [\App\Http\Controllers\AreaKampusController::class, 'search'])->name('area-kampus.search');

    Route::get('/admin/pelatihan', [\App\Http\Controllers\PelatihanController::class, 'index'])->name('pelatihan.index');
    Route::post('/admin/pelatihan', [\App\Http\Controllers\PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::post('/admin/pelatihan/{id}/edit', [\App\Http\Controllers\PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::put('/admin/pelatihan/{id}', [\App\Http\Controllers\PelatihanController::class, 'update'])->name('pelatihan.update');
    Route::delete('/admin/pelatihan/{id}', [\App\Http\Controllers\PelatihanController::class, 'destroy'])->name('pelatihan.destroy');
    Route::get('/admin/pelatihan/search', [\App\Http\Controllers\PelatihanController::class, 'search'])->name('pelatihan.search');

    Route::get('/admin/komunitas', [\App\Http\Controllers\KomunitasController::class, 'index'])->name('komunitas.index');
    Route::post('/admin/komunitas', [\App\Http\Controllers\KomunitasController::class, 'store'])->name('komunitas.store');
    Route::post('/admin/komunitas/{id}/edit', [\App\Http\Controllers\KomunitasController::class, 'edit'])->name('komunitas.edit');
    Route::put('/admin/komunitas/{id}', [\App\Http\Controllers\KomunitasController::class, 'update'])->name('komunitas.update');
    Route::delete('/admin/komunitas/{id}', [\App\Http\Controllers\KomunitasController::class, 'destroy'])->name('komunitas.destroy');
    Route::get('/admin/komunitas/search', [\App\Http\Controllers\KomunitasController::class, 'search'])->name('komunitas.search');

    Route::get('/admin/pertanyaan', [\App\Http\Controllers\PertanyaanController::class, 'index'])->name('pertanyaan.index');
    Route::post('/admin/pertanyaan', [\App\Http\Controllers\PertanyaanController::class, 'store'])->name('pertanyaan.store');
    Route::post('/admin/pertanyaan/{id}/edit', [\App\Http\Controllers\PertanyaanController::class, 'edit'])->name('pertanyaan.edit');
    Route::put('/admin/pertanyaan/{id}', [\App\Http\Controllers\PertanyaanController::class, 'update'])->name('pertanyaan.update');
    Route::delete('/admin/pertanyaan/{id}', [\App\Http\Controllers\PertanyaanController::class, 'destroy'])->name('pertanyaan.destroy');
    Route::get('/admin/pertanyaan/search', [\App\Http\Controllers\PertanyaanController::class, 'search'])->name('pertanyaan.search');

    Route::get('/admin/users', [\App\Http\Controllers\UserAuthController::class, 'index'])->name('users.index');
    Route::post('/admin/users', [\App\Http\Controllers\UserAuthController::class, 'store'])->name('users.store');
    Route::post('/admin/user/{id}/edit', [\App\Http\Controllers\UserAuthController::class, 'edit'])->name('users.edit');
    Route::delete('/admin/user/{id}', [\App\Http\Controllers\UserAuthController::class, 'destroy'])->name('users.destroy');
    Route::put('/admin/user/{id}', [\App\Http\Controllers\UserAuthController::class, 'update'])->name('users.update');
    Route::get('/admin/users/search', [\App\Http\Controllers\UserAuthController::class, 'search'])->name('users.search');
    Route::post('/admin/users/logout', [\App\Http\Controllers\UserAuthController::class, 'logout'])->name('users.logout');

    Route::get('/admin/histori-penilaian', [\App\Http\Controllers\HistoriPenilaianController::class, 'index'])->name('histori-penilaian.index');
    Route::get('/admin/histori-penilaian/search', [\App\Http\Controllers\HistoriPenilaianController::class, 'search'])->name('histori-penilaian.search');
});
