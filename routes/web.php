<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\ContestsController;
use App\Http\Controllers\Dashboard\ResultsController;
use App\Http\Controllers\FrontEnd\HomeController;


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

//Route::get('/', [DashboardController::class,'index'])->middleware('auth');


//*******frontEnd*********//
Route::group(['prefix'=>'/'], function () {
    Route::get('/',[HomeController::class,'index'])->name('quiz.index');
    Route::get('/quiz-page/{id}',[HomeController::class,'quizPage'])->name('quiz-page');
    Route::get('/results/store',[HomeController::class,'ResultStore'])->name('results.store');
    Route::get('/quiz-success',[HomeController::class,'quizSuccess'])->name('quiz-success');
});


Route::group([
    'prefix' => '/admin/',
    'middleware' => ['web']
], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login',  [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('Admin.login');
    });
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardController::class,'index'])->name('home');
        Route::resource('admins',AdminController::class);


        Route::resource('users',UserController::class);

        Route::post('/logout', [AuthController::class,'logout'])->name('Admin.logout');
        Route::get('/account-settings', [AuthController::class,'accountSettings'])->name('Admin.accountSettings');
        Route::post('/account-settings', [AuthController::class,'updateAccountSettings'])->name('Admin.updateAccountSettings');

        Route::resource('/roles', RoleController::class);

        //courses
        Route::resource('contests',ContestsController::class);
        Route::get('/contests/update-status/{id}', [ContestsController::class, 'updateStatus'])->name('update-contests-status');
        Route::get('results/{contests_id}', [ResultsController::class, 'index'])->name('results.index');



        Route::get('settings/',[SettingController::class, 'index'])->name('settings.index');
        Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');
    });

});

