<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sortirProduit;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\etat_de_stockController;

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
    return view('login');
});


Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/produits', [ProduitController::class, 'index']);
    Route::resource('/produits', ProduitController::class);

    Route::resource('/agents', AgentController::class);

    Route::resource('/services', ServiceController::class);
    Route::patch('/services/{id}', [ServiceController::class, 'update'])->name('services.update');


    Route::resource('/sortiProduit', sortirProduit::class);
    Route::get('/getAgents', [sortirProduit::class, "getAgents"]);
    Route::post('/updateProduct', [sortirProduit::class, 'update']);

    Route::resource('/etatS', etat_de_stockController::class);

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
