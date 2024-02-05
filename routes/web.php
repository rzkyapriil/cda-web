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
Route::get('/questionnaire', [\App\Http\Controllers\HomeController::class, 'questionnaire'])->name('questionnaire');
Route::post('/login', [\App\Http\Controllers\UserAuthController::class, 'login'])->name('users.login');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/dosen', [\App\Http\Controllers\DosenController::class, 'index'])->name('admin.dosen');
    Route::post('/admin/dosen', [\App\Http\Controllers\DosenController::class, 'create'])->name('admin.create-dosen');
    Route::get('/admin/dosen/{id}/edit', [\App\Http\Controllers\DosenController::class, 'edit'])->name('admin.edit-dosen');
    Route::put('/admin/dosen/{id}/update', [\App\Http\Controllers\DosenController::class, 'update'])->name('admin.update-dosen');
    Route::delete('/admin/dosen/{id}/delete', [\App\Http\Controllers\DosenController::class, 'delete'])->name('admin.delete-dosen');

    Route::get('/admin/fakultas', [\App\Http\Controllers\FakultasController::class, 'index'])->name('admin.fakultas');
    Route::post('/admin/fakultas', [\App\Http\Controllers\FakultasController::class, 'create'])->name('admin.create-fakultas');
    Route::get('/admin/fakultas/{id}/edit', [\App\Http\Controllers\FakultasController::class, 'edit'])->name('admin.edit-fakultas');
    Route::put('/admin/fakultas/{id}/update', [\App\Http\Controllers\FakultasController::class, 'update'])->name('admin.update-fakultas');
    Route::delete('/admin/fakultas/{id}/delete', [\App\Http\Controllers\FakultasController::class, 'delete'])->name('admin.delete-fakultas');

    Route::get('/admin/jurusan-binaan', [\App\Http\Controllers\JurusanBinaanController::class, 'index'])->name('admin.jurusan-binaan');
    Route::post('/admin/jurusan-binaan', [\App\Http\Controllers\JurusanBinaanController::class, 'create'])->name('admin.create-jurusan-binaan');
    Route::get('/admin/jurusan-binaan/{id}/edit', [\App\Http\Controllers\JurusanBinaanController::class, 'edit'])->name('admin.edit-jurusan-binaan');
    Route::put('/admin/jurusan-binaan/{id}/update', [\App\Http\Controllers\JurusanBinaanController::class, 'update'])->name('admin.update-jurusan-binaan');
    Route::delete('/admin/jurusan-binaan/{id}/delete', [\App\Http\Controllers\JurusanBinaanController::class, 'delete'])->name('admin.delete-jurusan-binaan');

    Route::get('/admin/binaan', [\App\Http\Controllers\BinaanController::class, 'index'])->name('admin.binaan');
    Route::post('/admin/binaan', [\App\Http\Controllers\BinaanController::class, 'create'])->name('admin.create-binaan');
    Route::get('/admin/binaan/{id}/edit', [\App\Http\Controllers\BinaanController::class, 'edit'])->name('admin.edit-binaan');
    Route::put('/admin/binaan/{id}/update', [\App\Http\Controllers\BinaanController::class, 'update'])->name('admin.update-binaan');
    Route::delete('/admin/binaan/{id}/delete', [\App\Http\Controllers\BinaanController::class, 'delete'])->name('admin.delete-binaan');

    Route::get('/admin/area-kampus', [\App\Http\Controllers\AreaKampusController::class, 'index'])->name('admin.area-kampus');
    Route::post('/admin/area-kampus', [\App\Http\Controllers\AreaKampusController::class, 'create'])->name('admin.create-area-kampus');
    Route::get('/admin/area-kampus/{id}/edit', [\App\Http\Controllers\AreaKampusController::class, 'edit'])->name('admin.edit-area-kampus');
    Route::put('/admin/area-kampus/{id}/update', [\App\Http\Controllers\AreaKampusController::class, 'update'])->name('admin.update-area-kampus');
    Route::delete('/admin/area-kampus/{id}/delete', [\App\Http\Controllers\AreaKampusController::class, 'delete'])->name('admin.delete-area-kampus');

    Route::get('/admin/pelatihan', [\App\Http\Controllers\PelatihanController::class, 'index'])->name('admin.pelatihan');
    Route::post('/admin/pelatihan', [\App\Http\Controllers\PelatihanController::class, 'create'])->name('admin.create-pelatihan');
    Route::get('/admin/pelatihan/{id}/edit', [\App\Http\Controllers\PelatihanController::class, 'edit'])->name('admin.edit-pelatihan');
    Route::put('/admin/pelatihan/{id}/update', [\App\Http\Controllers\PelatihanController::class, 'update'])->name('admin.update-pelatihan');
    Route::delete('/admin/pelatihan/{id}/delete', [\App\Http\Controllers\PelatihanController::class, 'delete'])->name('admin.delete-pelatihan');

    Route::get('/admin/komunitas', [\App\Http\Controllers\KomunitasController::class, 'index'])->name('admin.komunitas');
    Route::post('/admin/komunitas', [\App\Http\Controllers\KomunitasController::class, 'create'])->name('admin.create-komunitas');
    Route::get('/admin/komunitas/{id}/edit', [\App\Http\Controllers\KomunitasController::class, 'edit'])->name('admin.edit-komunitas');
    Route::put('/admin/komunitas/{id}/update', [\App\Http\Controllers\KomunitasController::class, 'update'])->name('admin.update-komunitas');
    Route::delete('/admin/komunitas/{id}/delete', [\App\Http\Controllers\KomunitasController::class, 'delete'])->name('admin.delete-komunitas');

    Route::get('/admin/pertanyaan', [\App\Http\Controllers\PertanyaanController::class, 'index'])->name('admin.pertanyaan');
    Route::post('/admin/pertanyaan', [\App\Http\Controllers\PertanyaanController::class, 'create'])->name('admin.create-pertanyaan');
    Route::get('/admin/pertanyaan/{id}/edit', [\App\Http\Controllers\PertanyaanController::class, 'edit'])->name('admin.edit-pertanyaan');
    Route::put('/admin/pertanyaan/{id}/update', [\App\Http\Controllers\PertanyaanController::class, 'update'])->name('admin.update-pertanyaan');
    Route::delete('/admin/pertanyaan/{id}/delete', [\App\Http\Controllers\PertanyaanController::class, 'delete'])->name('admin.delete-pertanyaan');

    Route::post('/logout', [\App\Http\Controllers\UserAuthController::class, 'logout'])->name('users.logout');
});
