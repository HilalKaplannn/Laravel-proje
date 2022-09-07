<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TrashedController;
use App\Http\Controllers\FinishedController;
use App\Http\Controllers\DashboardController;
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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})*/



Route::get('/giris', function () {return view('giris');})->name('giris');
Route::get('/register1', function () {return view('register1');})->name('register1');

Route::get('/iletisim', function () {return view('iletisim');})->name('iletisim');
Route::get("/dashboard",[DashboardController::class,"index"])->middleware(['auth'])->name('dashboard');
Route::get('/hakkimda', function () {return view('hakkimda');})->name('hakkimda');


Route::prefix("tasks")->middleware(["auth"])->group(function (){
    Route::get("/",[TaskController::class,"index"])->name("tasks.index");
    Route::get("/create",[TaskController::class,"create"])->name("tasks.create");
    Route::post("/",[TaskController::class,"store"])->name("tasks.store");
    Route::get("{uuid}/edit",[TaskController::class,"edit"])->name("tasks.edit");
    Route::post("/update/{task_uuid}",[TaskController::class,"update"])->name("tasks.update");
    Route::get("{uuid}/delete",[TaskController::class,"destroy"])->name("tasks.destroy");

    Route::get("{uuid}/recover",[TrashedController::class,"recover"])->name("tasks.recover");
    Route::get("{uuid}/harddelete",[TrashedController::class,"hardDelete"])->name("tasks.harddelete");
    Route::get("/trashed",[TrashedController::class,"trashed"])->name("tasks.trashed");

    Route::post('/iletisim',[TaskController::class,"contactPost"])->name("contacts.post");
    Route::get("{uuid}/show",[TaskController::class,"show"])->name("tasks.show");

    Route::get("/finished",[FinishedController::class,"finished"])->name("tasks.finished");



});



require __DIR__.'/auth.php';
