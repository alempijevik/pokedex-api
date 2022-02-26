<?php

use App\Models\Evolutions;
use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/pokemon', function() {
    return Pokemon::all();
});
Route::get('/types', function() {
    return Type::all();
});
Route::get('/pokemon-types', function() {
    return PokemonType::all();
});
Route::get('/evolutions', function() {
    return Evolutions::all();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
