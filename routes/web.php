<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Models\Schedule;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-suara', [DataFeedController::class, 'dataSuara'])->name('data-suara');
    Route::get('/data-pemilih', [DataFeedController::class, 'dataPemilih'])->name('data-pemilih');

    Route::middleware('pemilih')->group(function(){
        Route::get('vote', function(){
            $schedule = Schedule::query()->where('tahun', date('Y', strtotime(now())))->first();
            return view('pages.vote.index', compact('schedule'));
        })->name('vote.index');
    });

    Route::middleware('admin')->group(function(){
        Route::get('jadwal', function(){
            return view('pages.jadwal.index');
        })->name('jadwal.index');

        Route::get('panitia', function(){
            return view('pages.panitia.index');
        })->name('panitia.index');

        Route::get('calon', function(){
            return view('pages.calon.index');
        })->name('calon.index');

        Route::get('pemilih', function(){
            return view('pages.pemilih.index');
        })->name('pemilih.index');

        Route::get('laporan', function(){
            return view('pages.laporan.index');
        })->name('laporan.index');
    });
    
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});