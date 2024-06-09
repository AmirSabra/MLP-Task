<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Main Web Route
Route::get('/', [TaskController::class, 'index']);
// Web Route for Creating a Task
Route::post('create-task', [TaskController::class, 'create']);
// Web Route for Marking a Task as Completed with the Task ID as a Parameter
Route::get('mark-task-as-complete/{taskId}', [TaskController::class, 'markAsComplete']);
// Web Route for Deleting a Task with the Task ID as a Parameter
Route::get('delete-task/{taskId}', [TaskController::class, 'delete']);
