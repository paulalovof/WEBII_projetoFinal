<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\InscricaoController;
use App\Models\Curso;

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
    return view('welcome');
});

Route::resource('/eixo', EixoController::class)->middleware(['auth']);


Route::post('/inscricao/{id}', [InscricaoController::class, 'index'])->name('inscricao.index');

Route::post('/inscricao/cancel/{id}', [InscricaoController::class, 'cancel'])->name('inscricao.cancel');

Route::get('/report/eixo', [EixoController::class, 'report']) ->name('report');

Route::get('/graph/eixo', [EixoController::class, 'graph']) -> name('eixo.graph');

Route::resource('curso', CursoController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
