<?php

use App\Http\Controllers\FundController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FundController::class, "index"]);
Route::get('/db', [FundController::class, "db"]);
Route::get("main", [FundController::class, "main"]);
Route::get("test", [FundController::class  , "test"]);
Route::get("set_names" , [FundController::class, "setNames"]);
Route::get("chart", [FundController::class, "chart"]);
Route::get("set-shakhes-kol-to-db", [FundController::class, "setShakhesKolToDb"]);
Route::get("shakhes-kol", [FundController::class, "shakhes_kol_view"]);
Route::get("shakhes-kol-data", [FundController::class, "shakhes_kol"]);
