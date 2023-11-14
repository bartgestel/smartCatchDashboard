<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoatCheck;
use App\Models\Ship;

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
    return view('index');
});
Route::get('/signup', function(){
    return view('register');
});

//Routes for BoatCheck
Route::get('/home', [BoatCheck::class, 'boatCheck']);
Route::get('/boats/{id}', [BoatCheck::class, 'getBoats']);
Route::post('/weight', [BoatCheck::class, 'weight']);

//Routes for userController
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);


