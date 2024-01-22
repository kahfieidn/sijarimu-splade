<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return redirect('/login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    Route::prefix('dashboard')->group(function () {
        Route::group(['middleware' => ['role:pemohon']], function () {
            Route::resource('/pemohon', App\Http\Controllers\Pemohon\DashboardController::class);
            Route::post('/pemohon/profile', [App\Http\Controllers\Pemohon\DashboardController::class, 'profile'])->name('pemohon.profile.store');
        });
        Route::group(['middleware' => ['role:front_office']], function () {
            Route::resource('/front-office', App\Http\Controllers\FrontOffice\DashboardController::class)->parameters([
                'front-office' => 'pemohon'
            ]);
        });
        Route::group(['middleware' => ['role:back_office']], function () {
            Route::resource('/back-office', App\Http\Controllers\BackOffice\DashboardController::class)->parameters([
                'back-office' => 'pemohon'
            ]);
            Route::resource('/back-office-2', App\Http\Controllers\BackOffice2\DashboardController::class)->parameters([
                'back-office-2' => 'pemohon'
            ]);
        });
        Route::group(['middleware' => ['role:verifikator_1']], function () {
            Route::resource('/verifikator-1', App\Http\Controllers\Verifikator_1\DashboardController::class)->parameters([
                'verifikator-1' => 'pemohon'
            ]);
        });
        Route::group(['middleware' => ['role:verifikator_2']], function () {
            Route::resource('/verifikator-2', App\Http\Controllers\Verifikator_2\DashboardController::class)->parameters([
                'verifikator-2' => 'pemohon'
            ]);
        });
        Route::group(['middleware' => ['role:kepala_dinas']], function () {
            Route::resource('/kepala-dinas', App\Http\Controllers\KepalaDinas\DashboardController::class)->parameters([
                'kepala-dinas' => 'pemohon'
            ]);
        });
    });

    Route::group(['middleware' => ['role:pemohon|front_office|back_office|opd|verifikator_1|verifikator_2|kepala_dinas|admin|admin_1|admin_2|admin3']], function () {
        Route::get('/dashboard/generate/penelitian/{perizinan_id}/{permohonan_id}', [App\Http\Controllers\Cetak\GeneratePenelitian::class, 'generatePenelitian'])->name('dashboard.cetak.request');
    });


    require __DIR__ . '/auth.php';
});
