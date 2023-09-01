<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register',[UserController::class,'RegisterPage'])->name('reg');
Route::get('login',[UserController::class,'LoginPage'])->name('log');
Route::post('create',[UserController::class,'Register'])->name('register');
Route::post('sign_in',[UserController::class,'Login'])->name('login');
Route::group(['prefix'=>'users','middleware'=>'check'],function(){
    Route::get('main_page',[UserController::class,'MainPage'])->name('main_page');
    Route::get('task/{task_id}',[UserController::class,'TaskPage'])->name('task_page');
    Route::get('edit_task/{task_id}',[UserController::class,'EditTaskPage'])->name('edit_task_page');
    Route::post('edit/{task_id}',[UserController::class,'EditTask'])->name('edit');
    Route::post('delete/{task_id}',[UserController::class,'DeleteTask'])->name('delete');
    Route::get('create_task',[UserController::class,'CreateTaskPage'])->name('create_task');
    Route::post('create',[UserController::class,'CreateTask'])->name('create');
    Route::post('accept/{task_id}',[UserController::class,'AcceptTask'])->name('accept');
    Route::get('logout',[UserController::class,'Logout'])->name('logout');
    Route::get('edit_profile',[UserController::class,'EditProfilePage'])->name('edit_profile');
    Route::post('edit_name',[UserController::class,'EditProfileName'])->name('edit_name');
    Route::get('edit_password',[UserController::class,'EditPasswordPage'])->name('edit_password');
    Route::post('edit_pass',[UserController::class,'EditPassword'])->name('edit_pass');
});