<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(["auth", "verified"])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get("/apartments/create", [ApartmentController::class, "create"])->name("apartments.create");          //CREATE
        Route::post("/apartments", [ApartmentController::class, "store"])->name("apartments.store");
        Route::get("/apartments", [ApartmentController::class, "index"])->name("apartments.index");                   //READ
        Route::get("/apartments/{apartment}", [ApartmentController::class, "show"])->name("apartments.show");
        Route::get("/apartments/{id}/edit", [ApartmentController::class, "edit"])->name("apartments.edit");           //UPDATE
        Route::put("/apartments/{id}", [ApartmentController::class, "update"])->name("apartments.update");
        Route::delete("/apartments/{id}", [ApartmentController::class, "destroy"])->name("apartments.destroy");       //DESTROY
// la route dell'update posso chiamarla in put o path è indifferente, questa rotta riceverà i dati di edit e aggiornare l'elemento nel database a differenza dello store che crea l'elemento
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
