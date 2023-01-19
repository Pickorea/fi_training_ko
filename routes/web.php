<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Training\IslandController;
use App\Http\Controllers\Training\TrainingController;
use App\Http\Controllers\Training\TrainingTypeController;
use App\Http\Controllers\Training\VillageController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Training\ChartController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function ()
 {
    

    //employee
    Route::group(['as' => 'employee.', 'prefix' => 'employee'], function () {
        Route::get('', [EmployeeController::class, 'index'])->name('index');
        Route::get('create', [EmployeeController::class, 'create'])->name('create');
        Route::post('', [EmployeeController::class, 'store'])->name('store');
        Route::get('export', [EmployeeController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{kiisland?}'], function () { 
        Route::get('', [EmployeeController::class, 'show'])->name('show');
        Route::get('edit', [EmployeeController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [EmployeeController::class, 'update'])->name('update');
        Route::delete('', [EmployeeController::class, 'delete'])->name('delete');
        });
    });

     //island
     Route::group(['as' => 'island.', 'prefix' => 'island'], function () {
        Route::get('', [IslandController::class, 'index'])->name('index');
        Route::get('create', [IslandController::class, 'create'])->name('create');
        Route::post('', [IslandController::class, 'store'])->name('store');
        Route::get('export', [IslandController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{kiisland?}'], function () { 
        Route::get('', [IslandController::class, 'show'])->name('show');
        Route::get('edit', [IslandController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [IslandController::class, 'update'])->name('update');
        Route::delete('', [IslandController::class, 'delete'])->name('delete');
        });
    });

    //training detail
    Route::group(['as' => 'training.', 'prefix' => 'training'], function () {
        Route::get('', [TrainingController::class, 'index'])->name('index');
        Route::get('create', [TrainingController::class, 'create'])->name('create');
        Route::post('', [TrainingController::class, 'store'])->name('store');
        Route::get('export', [TrainingController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{training?}'], function () { 
        Route::get('', [TrainingController::class, 'show'])->name('show');
        Route::get('edit', [TrainingController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [TrainingController::class, 'update'])->name('update');
        Route::delete('', [TrainingController::class, 'delete'])->name('delete');
        });
    });

     //training_type
     Route::group(['as' => 'training_type.', 'prefix' => 'training_type'], function () {
        Route::get('', [TrainingTypeController::class, 'index'])->name('index');
        Route::get('create', [TrainingTypeController::class, 'create'])->name('create');
        Route::post('', [TrainingTypeController::class, 'store'])->name('store');
        Route::get('export', [TrainingTypeController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{type}'], function () { 
        Route::get('', [TrainingTypeController::class, 'show'])->name('show');
        Route::get('edit', [TrainingTypeController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [TrainingTypeController::class, 'update'])->name('update');
        Route::delete('', [TrainingTypeController::class, 'delete'])->name('delete');
        });
    });

     //village
     Route::group(['as' => 'village.', 'prefix' => 'village'], function () {
        Route::get('', [VillageController::class, 'index'])->name('index');
        Route::get('create', [VillageController::class, 'create'])->name('create');
        Route::post('', [VillageController::class, 'store'])->name('store');
        Route::get('export', [VillageController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{type}'], function () { 
        Route::get('', [VillageController::class, 'show'])->name('show');
        Route::get('edit', [VillageController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [VillageController::class, 'update'])->name('update');
        Route::delete('', [VillageController::class, 'delete'])->name('delete');
        });
    });

     //participant
    //  Route::group(['as' => 'participant.', 'prefix' => 'participant'], function () {
    //     Route::get('', [ParticipantController::class, 'index'])->name('index');
    //     Route::get('create', [ParticipantController::class, 'create'])->name('create');
    //     Route::post('', [ParticipantController::class, 'store'])->name('store');
    //     Route::get('export', [ParticipantController::class, 'exportlist'])->name('export');
    //     Route::group(['prefix' => '{participant}'], function () { 
    //     Route::get('', [ParticipantController::class, 'show'])->name('show');
    //     Route::get('edit', [ParticipantController::class, 'edit'])->name('edit');
    //     Route::match(['PUT', 'PATCH'], '', [ParticipantController::class, 'update'])->name('update');
    //     Route::delete('', [ParticipantController::class, 'delete'])->name('delete');
    //     });
    // });


     //reports
     Route::group(['as' => 'report.', 'prefix' => 'report'], function () {
        Route::get('repo', [ReportController::class, 'index'])->name('index');
        Route::get('', [ReportController::class, '_repo'])->name('repo');
        Route::get('/training', [ReportController::class, 'generatePDF'])->name('pdf');
        Route::get('koolexcel', [ReportController::class, 'export'])->name('koolexcel');
        Route::get('excel', [ReportController::class, 'exportTrainingAttendance'])->name('excel');
        Route::get('create', [ReportController::class, 'create'])->name('create');
        Route::post('', [ReportController::class, 'store'])->name('store');
        Route::get('export', [ReportController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{report}'], function () { 
        Route::get('', [ReportController::class, 'show'])->name('show');
        Route::get('edit', [ReportController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [ReportController::class, 'update'])->name('update');
        Route::delete('', [ReportController::class, 'delete'])->name('delete');
        });
    });

     //chart
     Route::group(['as' => 'chart.', 'prefix' => 'chart'], function () {
        Route::get('', [ChartController::class, 'index'])->name('index');
        Route::get('koolexcel', [ChartController::class, 'export'])->name('koolexcel');
        Route::get('excel', [ChartController::class, 'exportTrainingAttendance'])->name('excel');
        Route::get('create', [ChartController::class, 'create'])->name('create');
        Route::post('', [ChartController::class, 'store'])->name('store');
        Route::get('export', [ChartController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{chart}'], function () { 
        Route::get('', [ChartController::class, 'show'])->name('show');
        Route::get('edit', [ChartController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'PATCH'], '', [ChartController::class, 'update'])->name('update');
        Route::delete('', [ChartController::class, 'delete'])->name('delete');
        });
    });
   

});