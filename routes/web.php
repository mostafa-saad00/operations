<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Officers;
use App\Http\Livewire\Fromtooperations;
use App\Http\Livewire\Weeklyofficeroperations;
use App\Http\Livewire\Createweeklyofficeroperations;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DailyoperationController;
use App\Http\Controllers\FromtooperationController;
use App\Http\Controllers\WeeklyofficeroperationController;
use App\Models\Officer;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Officers Routes
Route::get('/officers', Officers::class)->middleware(['auth'])->name('index-officers');
Route::controller(OfficerController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-officer', 'create')->name('create-officer');
    Route::post('/store-officer', 'store')->name('store-officer');
    Route::get('/edit-officer/{officer}', 'edit')->name('edit-officer');
    Route::put('/update-officer/{officer}', 'update')->name('update-officer');
    Route::delete('/delete-officer/{officer}', 'destroy')->name('destroy-officer');
});
// End Officers Routes

// Daily Operations Routes
Route::controller(DailyoperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/dailyoperations', 'index')->name('index-dailyoperations');
    Route::get('/create-dailyoperation', 'create')->name('create-dailyoperation');
    Route::post('/store-dailyoperation', 'store')->name('store-dailyoperation');
    Route::get('/edit-dailyoperation/{dailyoperation}', 'edit')->name('edit-dailyoperation');
    Route::put('/update-dailyoperation/{dailyoperation}', 'update')->name('update-dailyoperation');
    Route::delete('/delete-dailyoperation/{dailyoperation}', 'destroy')->name('destroy-dailyoperation');
});
// Daily Operations Routes

// From To Operations Routes
Route::get('/fromtooperations', Fromtooperations::class)->middleware(['auth'])->name('index-fromtooperations');
Route::controller(FromtooperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-fromtooperation', 'create')->name('create-fromtooperation');
    Route::post('/store-fromtooperation', 'store')->name('store-fromtooperation');
    Route::delete('/delete-fromtooperation/{fromtooperation}', 'destroy')->name('destroy-fromtooperation');
});
// End From To Operations Routes

// Weekly Officer Operations
Route::get('/weeklyofficeroperations/{fromtooperation}', Weeklyofficeroperations::class)->middleware(['auth'])->name('index-weeklyofficeroperations');
Route::get('/create-weeklyofficeroperation/{officer}/{fromtooperation}', Createweeklyofficeroperations::class)->middleware(['auth'])->name('create-weeklyofficeroperation');
Route::controller(WeeklyofficeroperationController::class)->middleware(['auth'])->group(function () {
    Route::post('/store-weeklyofficeroperation/{officer}/{fromtooperation}', 'store')->name('store-weeklyofficeroperation');
    Route::post('/store-weeklyofficeroperations', 'stores')->name('store-weeklyofficeroperations');

});
// End Weekly Officer Operations

require __DIR__.'/auth.php';
