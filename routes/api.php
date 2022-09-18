<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SkillController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/menu', function(){
    return json_encode(PageController::getMenuItems());
});

Route::get('/content', function() {
    return json_encode(PageController::getContent('Welkom bij ACXDev'));
});

Route::get('/content/{title}', function($title) {
    return json_encode(PageController::getContent($title));
});

Route::get('/skills', function() {
    return json_encode(SkillController::getSkills());
});