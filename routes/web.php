<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Officers;
use App\Http\Livewire\ShowOfficer;
use App\Http\Livewire\Pistols;
use App\Http\Livewire\Fromtooperations;
use App\Http\Livewire\Weeklyofficeroperations;
use App\Http\Livewire\Createweeklyofficeroperations;
use App\Http\Livewire\Ma2moryats;
use App\Http\Livewire\Dailyoperations;
use App\Http\Livewire\Kitchenitems;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DailyoperationController;
use App\Http\Controllers\FromtooperationController;
use App\Http\Controllers\WeeklyofficeroperationController;
use App\Http\Controllers\PistolController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\NagadatahdafController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Ma2moryatController;
use App\Http\Controllers\KitchenitemController;
use App\Http\Controllers\KitchendailydistributionController;
use App\Models\Officer;
use App\Models\Gehat;
use App\Models\Pistol;
use App\Models\Training;
use App\Models\Weeklyofficeroperation;
use App\Models\Dailyoperation;


Route::get('word', function(){
    return view('word');
});

Route::post('word', [OfficerController::class, 'word'])->name('word');



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/testview', function () {
    return view('testview');
})->middleware(['auth']);

Route::get('/testview2', function () {
    return view('testview2');
})->middleware(['auth']);

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
            "type" => 'اجازة دوري',
        ]);

        Dailyoperation::create([
            "name" => 'اجازة مرضي',
            "type" => 'اجازة مرضي',
        ]);

        Dailyoperation::create([
            "name" => 'اجازة طارئة',
            "type" => 'اجازة طارئة',
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



Route::controller(PostController::class)->middleware(['auth'])->group(function () {
    Route::post('/store', 'store')->name('store-post');

    Route::post('/tmp-upload', 'tmpUpload');
    Route::post('/edit-officer/tmp-upload', 'tmpUpload');
    
    Route::delete('/tmp-delete', 'tmpDelete');
    Route::delete('/edit-officer/tmp-delete', 'tmpDelete');

});


// Officers Routes
Route::get('/officers', Officers::class)->middleware(['auth'])->name('index-officers');
Route::get('/officer/{officer}', ShowOfficer::class)->middleware(['auth'])->name('show-officer');
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
Route::get('/dailyoperations', Dailyoperations::class)->middleware(['auth'])->name('index-dailyoperations');
Route::controller(DailyoperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-dailyoperation', 'create')->name('create-dailyoperation');
    Route::post('/store-dailyoperation', 'store')->name('store-dailyoperation');
    Route::get('/edit-dailyoperation/{dailyoperation}', 'edit')->name('edit-dailyoperation');
    Route::put('/update-dailyoperation/{dailyoperation}', 'update')->name('update-dailyoperation');
    Route::delete('/delete-dailyoperation/{dailyoperation}', 'destroy')->name('destroy-dailyoperation');
});
// End Daily Operations Routes

// Nagadat Ahdaf Routes
Route::controller(NagadatahdafController::class)->middleware(['auth'])->group(function () {
    Route::get('/nagadatahdaf', 'index')->name('index-nagadatahdaf');
}); 
// End Nagadat Ahdaf Routes

// Daily trainings Routes
Route::controller(TrainingController::class)->middleware(['auth'])->group(function () {
    Route::get('/trainings', 'index')->name('index-trainings');
    Route::get('/create-training', 'create')->name('create-training');
    Route::post('/store-training', 'store')->name('store-training');
    Route::get('/edit-training/{training}', 'edit')->name('edit-training');
    Route::put('/update-training/{training}', 'update')->name('update-training');
    Route::delete('/delete-training/{training}', 'destroy')->name('destroy-training');
});
// End trainings Routes


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

// Ma2moryat
Route::get('/ma2moryats', Ma2moryats::class)->middleware(['auth'])->name('index-ma2moryats');
Route::controller(Ma2moryatController::class)->middleware(['auth'])->group(function () {
    Route::post('/store-ma2moryat', 'store')->name('store-ma2moryat');
    Route::delete('/delete-ma2moryat/{ma2moryat}', 'destroy')->name('destroy-ma2moryat');

});
// End Ma2moryat


// kitchen
Route::get('/kitchenitems', kitchenitems::class)->middleware(['auth'])->name('index-kitchenitems');
Route::controller(KitchenitemController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-kitchenitem', 'create')->name('create-kitchenitem');
    Route::post('/store-kitchenitem', 'store')->name('store-kitchenitem');
    Route::get('/edit-kitchenitem/{kitchenitem}', 'edit')->name('edit-kitchenitem');
    Route::put('/update-kitchenitem/{kitchenitem}', 'update')->name('update-kitchenitem');
    Route::delete('/delete-kitchenitem/{kitchenitem}', 'destroy')->name('destroy-kitchenitem');


});
// End kitchen

// kitchendailydistribution
Route::controller(KitchendailydistributionController::class)->middleware(['auth'])->group(function () {
    Route::get('/create-kitchendailydistribution', 'create')->name('create-kitchendailydistribution');
    Route::post('/store-kitchendailydistribution', 'store')->name('store-kitchendailydistribution');
    Route::get('/edit-kitchendailydistribution/{kitchendailydistribution}', 'edit')->name('edit-kitchendailydistribution');
    Route::put('/update-kitchendailydistribution/{kitchendailydistribution}', 'update')->name('update-kitchendailydistribution');
    Route::delete('/delete-kitchendailydistribution/{kitchendailydistribution}', 'destroy')->name('destroy-kitchendailydistribution');

    Route::get('/show-kitchendailydistribution/{kitchendailydistribution}', 'show')->name('show-kitchendailydistribution');
});

// End kitchendailydistribution


require __DIR__.'/auth.php';
