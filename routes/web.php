<?php

use App\Http\Controllers\{
    CategoryController,
    TaskController,
};
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

Route::get('/', [TaskController::class, 'index']);


/**
 * GET|HEAD        tasks ................. tasks.index › TaskController@index 
 * POST            tasks ................. tasks.store › TaskController@store
 * GET|HEAD        tasks/create ........ tasks.create › TaskController@create
 * GET|HEAD        tasks/{task} ............ tasks.show › TaskController@show, Pas utilisé
 * PUT|PATCH       tasks/{task} ........ tasks.update › TaskController@update
 * DELETE          tasks/{task} ...... tasks.destroy › TaskController@destroy
 * GET|HEAD        tasks/{task}/edit ....... tasks.edit › TaskController@edit
 */
Route::resource("tasks", TaskController::class);


Route::resource("categories", CategoryController::class);
