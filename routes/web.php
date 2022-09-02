<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Officers;
use App\Http\Livewire\Pistols;
use App\Http\Livewire\Fromtooperations;
use App\Http\Livewire\Weeklyofficeroperations;
use App\Http\Livewire\Createweeklyofficeroperations;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DailyoperationController;
use App\Http\Controllers\FromtooperationController;
use App\Http\Controllers\WeeklyofficeroperationController;
use App\Http\Controllers\PistolController;
use App\Models\Officer;
use App\Models\Gehat;
use App\Models\Pistol;
use App\Models\Training;
use App\Models\Weeklyofficeroperation;
use App\Models\Dailyoperation;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $dailoperations = Dailyoperation::all();
    $gehats = Gehat::all();

    if($dailoperations->count() < 1)
    {  

        Dailyoperation::create([
            "name" => 'راحة اسبوعية',
            "type" => 'راحة اسبوعية',
        ]);

        Dailyoperation::create([
            "name" => 'راحة تعويضية',
            "type" => 'راحة تعويضية',
        ]);

        Dailyoperation::create([
            "name" => 'راحة خدمة',
            "type" => 'راحة خدمة',
        ]);

        Dailyoperation::create([
            "name" => 'عمل عادي',
            "type" => 'عمل عادي',
        ]);

        Dailyoperation::create([
            "name" => 'مبيت بالقطاع',
            "type" => 'مبيت بالقطاع',
        ]);

        Dailyoperation::create([
            "name" => 'اجازة دوري',
            "type" => 'اجازات',
        ]);

        Dailyoperation::create([
            "name" => 'اجازة مرضي',
            "type" => 'مرضي',
        ]);

        Dailyoperation::create([
            "name" => 'تواجد مسائي',
            "type" => 'تواجد مسائي',
        ]);

        Dailyoperation::create([
            "name" => 'مامورية سيناء',
            "type" => 'مامورية سيناء',
        ]);

        Dailyoperation::create([
            "name" => 'راحة مامورية سيناء',
            "type" => 'راحة مامورية سيناء',
        ]);

        Dailyoperation::create([
            "name" => 'انتداب',
            "type" => 'انتداب',
        ]);
        
        Dailyoperation::create([
            "name" => 'فرقة',
            "type" => 'فرق',
        ]);

        if($gehats->count() < 1)
        {
            Gehat::create([
                "name" => 'الكتيبة الاولي',
            ]);

            Gehat::create([
                "name" => 'الكتيبة الثانية',
            ]);

            Gehat::create([
                "name" => 'الدعم',
            ]);

            Gehat::create([
                "name" => 'الامن',
            ]);

            Gehat::create([
                "name" => 'الرئاسة',
            ]);
        }

        return view('dashboard');
    }
    else
    {
        return view('dashboard');
    }


    


    
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

// pistols Routes
Route::get('/pistols', Pistols::class)->middleware(['auth'])->name('index-pistols');
Route::controller(PistolController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-pistol', 'create')->name('create-pistol');
    Route::post('/store-pistol', 'store')->name('store-pistol');
    Route::get('/edit-pistol/{pistol}', 'edit')->name('edit-pistol');
    Route::put('/update-pistol/{pistol}', 'update')->name('update-pistol');
    Route::delete('/delete-pistol/{pistol}', 'destroy')->name('destroy-pistol');
});
// End pistols Routes

// Daily Operations Routes
Route::controller(DailyoperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/dailyoperations', 'index')->name('index-dailyoperations');
    Route::get('/create-dailyoperation', 'create')->name('create-dailyoperation');
    Route::post('/store-dailyoperation', 'store')->name('store-dailyoperation');
    Route::get('/edit-dailyoperation/{dailyoperation}', 'edit')->name('edit-dailyoperation');
    Route::put('/update-dailyoperation/{dailyoperation}', 'update')->name('update-dailyoperation');
    Route::delete('/delete-dailyoperation/{dailyoperation}', 'destroy')->name('destroy-dailyoperation');
});
// End Daily Operations Routes

// From To Operations Routes
Route::get('/fromtooperations', Fromtooperations::class)->middleware(['auth'])->name('index-fromtooperations');
Route::controller(FromtooperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-fromtooperation', 'create')->name('create-fromtooperation');
    Route::post('/store-fromtooperation', 'store')->name('store-fromtooperation');
    Route::delete('/delete-fromtooperation/{fromtooperation}', 'destroy')->name('destroy-fromtooperation');
    Route::get('/table-fromtooperation/{fromtooperation}', 'table')->name('table-fromtooperation');
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


// Daily operation Table
Route::get('/table-dailyoperation/{fromtooperation}/{day}', [DailyoperationController::class, 'table'])->name('table-dailyoperation');
// End Daily operation Table




require __DIR__.'/auth.php';
